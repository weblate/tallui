<?php

declare(strict_types=1);

/*
 * This file is part of composer/satis.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\Satis\PackageSelection;

use Composer\Json\JsonFile;
use Composer\Package\AliasPackage;
use Composer\Package\BasePackage;
use Composer\Package\CompletePackage;
use Composer\Package\Link;
use Composer\Package\Loader\ArrayLoader;
use Composer\Package\PackageInterface;
use Composer\Package\Version\VersionSelector;
use Composer\PartialComposer;
use Composer\Repository\ArrayRepository;
use Composer\Repository\ComposerRepository;
use Composer\Repository\ConfigurableRepositoryInterface;
use Composer\Repository\PlatformRepository;
use Composer\Repository\RepositoryInterface;
use Composer\Repository\RepositorySet;
use Composer\Semver\Constraint\MatchAllConstraint;
use Composer\Semver\VersionParser;
use Composer\Util\Filesystem;
use Symfony\Component\Console\Output\OutputInterface;

class PackageSelection
{
    /** @var OutputInterface The output Interface. */
    protected $output;

    /** @var bool Skips Exceptions if true. */
    protected $skipErrors;

    /** @var string packages.json file name. */
    private $filename;

    /** @var array Array of additional repositories for dependencies */
    private $depRepositories;

    /** @var bool Selects All Packages if true. */
    private $requireAll;

    /** @var bool Add required dependencies if true. */
    private $requireDependencies;

    /** @var bool required dev-dependencies if true. */
    private $requireDevDependencies;

    /** @var bool do not build packages only dependencies */
    private $onlyDependencies;

    /** @var bool only resolve best candidates in dependencies */
    private $onlyBestCandidates;

    /** @var bool Filter dependencies if true. */
    private $requireDependencyFilter;

    /** @var string Minimum stability accepted for Packages in the list. */
    private $minimumStability;

    /** @var array Minimum stability accepted by Package. */
    private $minimumStabilityPerPackage;

    /** @var array The active package filter to merge. */
    private $packagesFilter = [];

    /** @var string[]|null The active repository filter to merge. */
    private $repositoriesFilter;

    /** @var array Repositories mentioned in the satis config */
    private $repositories;

    /** @var bool Apply the filter also for resolving dependencies. */
    private $repositoryFilterDep;

    /** @var PackageInterface[] The selected packages from config */
    private $selected = [];

    /** @var array A list of packages marked as abandoned */
    private $abandoned = [];

    /** @var array A list of blacklisted package/constraints. */
    private $blacklist = [];

    /** @var array|null A list of package types. If set only packages with one of these types will be selected */
    private $includeTypes;

    /** @var array A list of package types that will not be selected */
    private $excludeTypes = [];

    /** @var array|bool Patterns from strip-hosts. */
    private $stripHosts = false;

    /** @var string The prefix of the distURLs when using archive. */
    private $archiveEndpoint;

    /** @var string The homepage - needed to get the relative paths of the providers */
    private $homepage;

    public function __construct(OutputInterface $output, string $outputDir, array $config, bool $skipErrors)
    {
        $this->output = $output;
        $this->skipErrors = $skipErrors;
        $this->filename = $outputDir.'/packages.json';
        $this->repositories = $config['repositories'] ?? [];
        $this->fetchOptions($config);
    }

    /**
     * @param  string[]|null  $repositoriesFilter
     */
    public function setRepositoriesFilter(?array $repositoriesFilter, bool $forDependencies = false): void
    {
        $this->repositoriesFilter = $repositoriesFilter !== [] ? $repositoriesFilter : null;
        $this->repositoryFilterDep = (bool) $forDependencies;
    }

    public function hasRepositoriesFilter(): bool
    {
        return $this->repositoriesFilter !== null;
    }

    public function hasBlacklist(): bool
    {
        return count($this->blacklist) > 0;
    }

    public function hasTypeFilter(): bool
    {
        return $this->includeTypes !== null || count($this->excludeTypes) > 0;
    }

    public function setPackagesFilter(array $packagesFilter = []): void
    {
        $this->packagesFilter = $packagesFilter;
    }

    public function hasFilterForPackages(): bool
    {
        return count($this->packagesFilter) > 0;
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function select(PartialComposer $composer, bool $verbose): array
    {
        // run over all packages and store matching ones
        $this->output->writeln('<info>Scanning packages</info>');

        $repos = $initialRepos = $composer->getRepositoryManager()->getRepositories();

        $stabilityFlags = array_map(function ($value) {
            return BasePackage::$stabilities[$value];
        }, $this->minimumStabilityPerPackage);

        if ($this->hasRepositoriesFilter()) {
            $repos = $this->filterRepositories($repos);

            if (count($repos) === 0) {
                throw new \InvalidArgumentException(sprintf('Specified repository URL(s) "%s" do not exist.', implode('", "', $this->repositoriesFilter)));
            }
        } else {
            // Only use repos explicitly activated in satis config if no further filter given
            $repos = [];
            // Todo: Use a filter function instead
            foreach ($initialRepos as $repo) {
                if ($repo instanceof ConfigurableRepositoryInterface) {
                    $config = $repo->getRepoConfig();
                    foreach ($this->repositories as $satisRepo) {
                        // TODO configurable repo types without URL attribute
                        // This is madness and should be an empty() but phpstan-strict-rules does not like empty()
                        if (
                            ! isset($config['url']) ||
                            ! is_string($config['url']) ||
                            $config['url'] === '' ||
                            ! isset($satisRepo['url']) ||
                            ! is_string($satisRepo['url']) ||
                            $satisRepo['url'] === ''
                        ) {
                            continue;
                        }
                        // Treat any combination of missing or present trailing slash as equal
                        if (rtrim($config['url'], '/') == rtrim($satisRepo['url'], '/')) {
                            $repos[] = $repo;
                        }
                    }
                } else {
                    if ($repo instanceof ArrayRepository) {
                        $repos[] = $repo;
                    }
                }
            }
        }

        if ($this->hasFilterForPackages()) {
            $repos = $this->filterPackages($repos);

            if (count($repos) === 0) {
                throw new \InvalidArgumentException(sprintf('Could not find any repositories config with "name" matching your package(s) filter: %s', implode(', ', $this->packagesFilter)));
            }
        }

        $repositorySet = new RepositorySet($this->minimumStability, $stabilityFlags);
        $this->addRepositories($repositorySet, $repos);

        // determine the required packages
        $rootLinks = $this->requireAll ? $this->getAllLinks($repos, $this->minimumStability, $verbose) : $this->getFilteredLinks($composer);

        // select the required packages and determine dependencies
        $depsLinks = $this->selectLinks($repositorySet, $rootLinks, true, $verbose);

        if ($this->requireDependencies || $this->requireDevDependencies) {
            $repositorySet = new RepositorySet($this->minimumStability, $stabilityFlags);
            $this->addRepositories($repositorySet, $repos);
            // dependencies of required packages might have changed and be part of filtered repos
            if ($this->hasRepositoriesFilter() && $this->repositoryFilterDep !== true) {
                $this->addRepositories($repositorySet, \array_filter($initialRepos, function ($r) use ($repos) {
                    return \in_array($r, $repos) === false;
                }));
            }

            // additional repositories for dependencies
            if (! $this->hasRepositoriesFilter() || $this->repositoryFilterDep !== true) {
                $this->addRepositories($repositorySet, $this->getDepRepos($composer));
            }

            // select dependencies
            $this->selectLinks($repositorySet, $depsLinks, false, $verbose);
        }

        $this->setSelectedAsAbandoned();

        $this->pruneBlacklisted($repositorySet, $verbose);
        $this->pruneByType($verbose);

        ksort($this->selected, SORT_STRING);

        return $this->selected;
    }

    /**
     * @return PackageInterface[]
     */
    public function clean(): array
    {
        $this->applyStripHosts();

        return $this->selected;
    }

    /**
     * @return PackageInterface[]
     */
    public function load(): array
    {
        $packages = [];
        $rootJsonFile = new JsonFile($this->filename);
        $dirname = dirname($this->filename);

        if (! $rootJsonFile->exists()) {
            return $packages;
        }

        $loader = new ArrayLoader();
        $rootConfig = $rootJsonFile->read();
        $includes = [];

        if (isset($rootConfig['includes']) && is_array($rootConfig['includes'])) {
            $includes = $rootConfig['includes'];
        }

        if (isset($rootConfig['providers']) && is_array($rootConfig['providers']) && isset($rootConfig['providers-url'])) {
            $baseUrl = $this->homepage ? parse_url(rtrim($this->homepage, '/'), PHP_URL_PATH).'/' : '';
            $baseUrlLength = strlen($baseUrl);

            foreach ($rootConfig['providers'] as $package => $provider) {
                $file = str_replace(['%package%', '%hash%'], [$package, $provider['sha256']], $rootConfig['providers-url']);

                if ($baseUrl && substr($file, 0, $baseUrlLength) === $baseUrl) {
                    $file = substr($file, $baseUrlLength);
                }

                $includes[$file] = $provider;
            }
        }

        foreach (array_keys($includes) as $file) {
            $includedJsonFile = new JsonFile($dirname.'/'.$file);

            if (! $includedJsonFile->exists()) {
                $this->output->writeln(sprintf(
                    '<error>File \'%s\' does not exist, defined in "includes" in \'%s\'</error>',
                    $includedJsonFile->getPath(),
                    $rootJsonFile->getPath()
                ));

                continue;
            }

            $includedConfig = $includedJsonFile->read();

            if (! isset($includedConfig['packages']) || ! is_array($includedConfig['packages'])) {
                continue;
            }

            $includedPackages = $includedConfig['packages'];

            foreach ($includedPackages as $name => $versions) {
                if (! is_array($versions)) {
                    continue;
                }

                foreach ($versions as $package) {
                    if (! is_array($package)) {
                        continue;
                    }

                    if (isset($package['name']) && in_array($package['name'], $this->packagesFilter)) {
                        continue;
                    }

                    $package = $loader->load($package);

                    if ($package instanceof AliasPackage) {
                        $package = $package->getAliasOf();
                    }

                    $packages[$package->getUniqueName()] = $package;
                }
            }
        }

        return $packages;
    }

    private function fetchOptions(array $config): void
    {
        $this->depRepositories = $config['repositories-dep'] ?? [];

        $this->requireAll = isset($config['require-all']) && $config['require-all'] === true;
        $this->requireDependencies = isset($config['require-dependencies']) && $config['require-dependencies'] === true;
        $this->requireDevDependencies = isset($config['require-dev-dependencies']) && $config['require-dev-dependencies'] === true;
        $this->onlyDependencies = isset($config['only-dependencies']) && $config['only-dependencies'] === true;
        $this->onlyBestCandidates = isset($config['only-best-candidates']) && $config['only-best-candidates'] === true;
        $this->requireDependencyFilter = (bool) ($config['require-dependency-filter'] ?? true);

        if (! $this->requireAll && ! isset($config['require'])) {
            $this->output->writeln('No explicit requires defined, enabling require-all');
            $this->requireAll = true;
        }

        $this->minimumStability = $config['minimum-stability'] ?? 'dev';
        $this->minimumStabilityPerPackage = $config['minimum-stability-per-package'] ?? [];
        $this->abandoned = $config['abandoned'] ?? [];
        $this->blacklist = $config['blacklist'] ?? [];
        $this->includeTypes = $config['include-types'] ?? null;
        $this->excludeTypes = $config['exclude-types'] ?? [];

        $this->stripHosts = $this->createStripHostsPatterns($config['strip-hosts'] ?? false);
        $this->archiveEndpoint = isset($config['archive']['directory']) ? ($config['archive']['prefix-url'] ?? $config['homepage']).'/' : null;

        $this->homepage = $config['homepage'] ?? null;
    }

    /**
     * @param  array|false  $stripHostsConfig
     * @return array|false
     */
    private function createStripHostsPatterns($stripHostsConfig)
    {
        if (! is_array($stripHostsConfig)) {
            return $stripHostsConfig;
        }

        $patterns = [];

        foreach ($stripHostsConfig as $entry) {
            if (! strlen($entry)) {
                continue;
            }

            if ($entry === '/private' || $entry === '/local') {
                $patterns[] = [$entry];

                continue;
            } elseif (strpos($entry, ':') !== false) {
                $type = 'ipv6';
                if (! defined('AF_INET6')) {
                    $this->output->writeln('<error>Unable to use IPv6.</error>');

                    continue;
                }
            } elseif (preg_match('#[^/.\\d]#', $entry) === 0) {
                $type = 'ipv4';
            } else {
                $type = 'name';
                $host = '#^(?:.+\.)?'.preg_quote($entry, '#').'$#ui';
                $patterns[] = [$type, $host];

                continue;
            }

            @[$host, $mask] = explode('/', $entry, 2);
            $host = @inet_pton($host);

            /** @var string|null $mask */
            if ($host === false || (int) $mask != $mask) {
                $this->output->writeln(sprintf('<error>Invalid subnet "%s"</error>', $entry));

                continue;
            }

            $host = unpack('N*', $host);

            if ($mask === null) {
                $mask = $type === 'ipv4' ? 32 : 128;
            } else {
                $mask = (int) $mask;

                if ($mask < 0 || ($type === 'ipv4' && $mask > 32) || ($type === 'ipv6' && $mask > 128)) {
                    continue;
                }
            }

            $patterns[] = [$type, $host, $mask];
        }

        return $patterns;
    }

    private function applyStripHosts(): void
    {
        if ($this->stripHosts === false) {
            return;
        }

        /** @var CompletePackage $package */
        foreach ($this->selected as $uniqueName => $package) {
            $sources = [];

            if ($package->getSourceType()) {
                $sources[] = 'source';
            }

            if ($package->getDistType()) {
                $sources[] = 'dist';
            }

            foreach ($sources as $index => $type) {
                $url = $type === 'source' ? $package->getSourceUrl() : $package->getDistUrl();

                // skip distURL applied by ArchiveBuilder
                if ($type === 'dist' && $this->archiveEndpoint !== null
                    && substr($url, 0, strlen($this->archiveEndpoint)) === $this->archiveEndpoint
                ) {
                    continue;
                }

                if ($this->matchStripHostsPatterns($url)) {
                    if ($type === 'dist') {
                        // if the type is not set, ArrayDumper ignores the other properties
                        $package->setDistType(null);
                    } else {
                        $package->setSourceType(null);
                    }

                    unset($sources[$index]);

                    if (count($sources) === 0) {
                        $this->output->writeln(sprintf('<error>%s has no source left after applying the strip-hosts filters and will be removed</error>', $package->getUniqueName()));

                        unset($this->selected[$uniqueName]);
                    }
                }
            }
        }
    }

    private function matchStripHostsPatterns(string $url): bool
    {
        if (Filesystem::isLocalPath($url)) {
            return true;
        }

        if (! is_array($this->stripHosts)) {
            return false;
        }

        $url = trim(parse_url($url, PHP_URL_HOST), '[]');

        if (filter_var($url, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
            $urltype = 'ipv4';
        } elseif (filter_var($url, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
            $urltype = 'ipv6';
        } else {
            $urltype = 'name';
        }

        $urlunpack = null;
        if ($urltype === 'ipv4' || $urltype === 'ipv6') {
            $urlunpack = unpack('N*', @inet_pton($url));
        }

        foreach ($this->stripHosts as $pattern) {
            @[$type, $host, $mask] = $pattern;

            if ($type === '/local') {
                if (($urltype === 'name' && strtolower($url) === 'localhost') || (
                    ($urltype === 'ipv4' || $urltype === 'ipv6') &&
                    filter_var($url, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE) === false
                )) {
                    return true;
                }
            } elseif ($type === '/private') {
                if (($urltype === 'ipv4' || $urltype === 'ipv6')
                    && filter_var($url, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === false
                ) {
                    return true;
                }
            } elseif ($type === 'ipv4' || $type === 'ipv6') {
                if ($urltype === $type && $this->matchAddr($urlunpack, $host, $mask)) {
                    return true;
                }
            } elseif ($type === 'name') {
                if ($urltype === 'name' && preg_match($host, $url)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Test if two addresses have the same prefix
     *
     * @param  int[]  $addr1 Chunked addr
     * @param  int[]  $addr2 Chunked addr
     * @param  int  $len Length of the test
     * @param  int  $chunklen Length of each chunk
     */
    private function matchAddr($addr1, $addr2, $len = 0, $chunklen = 32): bool
    {
        for (; $len > 0; $len -= $chunklen, next($addr1), next($addr2)) {
            $shift = $len >= $chunklen ? 0 : $chunklen - $len;

            if ((current($addr1) >> $shift) !== (current($addr2) >> $shift)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param  RepositoryInterface[]  $repositories
     *
     * @throws \Exception
     */
    private function addRepositories(RepositorySet $repositorySet, array $repositories): void
    {
        foreach ($repositories as $repository) {
            try {
                $repositorySet->addRepository($repository);
            } catch (\Exception $exception) {
                if (! $this->skipErrors) {
                    throw $exception;
                }

                $this->output->writeln(sprintf("<error>Skipping Exception '%s'.</error>", $exception->getMessage()));
            }
        }
    }

    private function setSelectedAsAbandoned(): void
    {
        /** @var CompletePackage $package */
        foreach ($this->selected as $name => $package) {
            if (array_key_exists($package->getName(), $this->abandoned)) {
                $package->setAbandoned($this->abandoned[$package->getName()]);
            }
        }
    }

    /**
     * Removes selected packages which are blacklisted in configuration.
     *
     * @return PackageInterface[]
     */
    private function pruneBlacklisted(RepositorySet $repositorySet, bool $verbose): array
    {
        $blacklisted = [];
        if ($this->hasBlacklist()) {
            $parser = new VersionParser();
            $pool = $repositorySet->createPoolWithAllPackages();
            /** @var BasePackage $package */
            foreach ($this->selected as $selectedKey => $package) {
                foreach ($this->blacklist as $blacklistName => $blacklistConstraint) {
                    $constraint = $parser->parseConstraints($blacklistConstraint);
                    if ($pool->match($package, $blacklistName, $constraint)) {
                        if ($verbose) {
                            $this->output->writeln('Blacklisted '.$package->getPrettyName().' ('.$package->getPrettyVersion().')');
                        }
                        $blacklisted[$selectedKey] = $package;
                        unset($this->selected[$selectedKey]);
                    }
                }
            }
        }

        return $blacklisted;
    }

    /**
     * Removes packages with types that don't match the configuration
     *
     * @return PackageInterface[]
     */
    private function pruneByType(bool $verbose): array
    {
        $excluded = [];
        if ($this->hasTypeFilter()) {
            foreach ($this->selected as $selectedKey => $package) {
                if ($this->includeTypes !== null && ! in_array($package->getType(), $this->includeTypes)) {
                    if ($verbose) {
                        $this->output->writeln(
                            'Excluded '.$package->getPrettyName()
                            .' ('.$package->getPrettyVersion().') because '
                            .$package->getType().' was not in the array of types to include.'
                        );
                    }
                    $excluded[$selectedKey] = $package;
                    unset($this->selected[$selectedKey]);
                } elseif (in_array($package->getType(), $this->excludeTypes)) {
                    if ($verbose) {
                        $this->output->writeln(
                            'Excluded '.$package->getPrettyName()
                            .' ('.$package->getPrettyVersion().') because '
                            .$package->getType().' was in the array of types to exclude.'
                        );
                    }
                    $excluded[$selectedKey] = $package;
                    unset($this->selected[$selectedKey]);
                }
            }
        }

        return $excluded;
    }

    /**
     * Gets a list of filtered Links.
     *
     * @return Link[]
     */
    private function getFilteredLinks(PartialComposer $composer): array
    {
        $links = array_values($composer->getPackage()->getRequires());

        if (! $this->hasFilterForPackages()) {
            return $links;
        }

        $packagesFilter = $this->packagesFilter;
        $links = array_filter(
            $links,
            function (Link $link) use ($packagesFilter) {
                return in_array($link->getTarget(), $packagesFilter);
            }
        );

        return array_values($links);
    }

    /**
     * @param  RepositoryInterface[]  $repositories
     * @return Link[]|PackageInterface[]
     */
    private function getAllLinks(array $repositories, string $minimumStability, bool $verbose): array
    {
        $links = [];

        foreach ($repositories as $repository) {
            if ($repository instanceof ComposerRepository) {
                foreach ($repository->getPackageNames() as $name) {
                    $links[] = new Link('__root__', $name, new MatchAllConstraint(), 'requires', '*');
                }

                continue;
            }

            try {
                $packages = $this->getPackages($repository);
            } catch (\Exception $exception) {
                if (! $this->skipErrors) {
                    throw $exception;
                }

                $this->output->writeln(sprintf("<error>Skipping Exception '%s'.</error>", $exception->getMessage()));

                continue;
            }

            foreach ($packages as $package) {
                if ($package instanceof AliasPackage) {
                    continue;
                }

                if (BasePackage::$stabilities[$package->getStability()] > BasePackage::$stabilities[$minimumStability]) {
                    if ($verbose) {
                        $this->output->writeln('Skipped '.$package->getPrettyName().' ('.$package->getStability().')');
                    }

                    continue;
                }

                $links[] = $package;
            }
        }

        return $links;
    }

    /**
     * @param  Link[]|PackageInterface[]  $links
     * @return Link[]
     */
    private function selectLinks(RepositorySet $repositorySet, array $links, bool $isRoot, bool $verbose): array
    {
        $depsLinks = $isRoot ? [] : $links;

        reset($links);

        while (key($links) !== null) {
            $link = current($links);
            $matches = [];
            if (is_a($link, PackageInterface::class)) {
                $matches = [$link];
            } elseif (is_a($link, Link::class)) {
                $name = $link->getTarget();
                if (! $isRoot && $this->onlyBestCandidates) {
                    $selector = new VersionSelector($repositorySet);
                    $match = $selector->findBestCandidate($name, $link->getConstraint()->getPrettyString());
                    $matches = $match ? [$match] : [];
                } elseif (PlatformRepository::isPlatformPackage($name)) {
                } else {
                    $matches = $repositorySet->createPoolForPackage($link->getTarget())->whatProvides($name, $link->getConstraint());
                }

                if (\count($matches) === 0) {
                    $this->output->writeln('<error>The '.$name.' '.$link->getPrettyConstraint().' requirement did not match any package</error>');
                }
            }

            foreach ($matches as $package) {
                // skip aliases
                if ($package instanceof AliasPackage) {
                    $package = $package->getAliasOf();
                }

                $uniqueName = $package->getUniqueName();
                $prettyVersion = $package->getPrettyVersion();

                if (! is_string($prettyVersion)) {
                    $this->output->writeln('<notice>Skipping '.$package->getPrettyName().' ('.$prettyVersion.') due to invalid version type</notice>');

                    continue;
                }

                // Check if + character is present, only once according to Semver;
                // otherwise metadata will stripped as usual
                if (substr_count($prettyVersion, '+') === 1) {
                    // re-inject metadata because it has been stripped by the VersionParser
                    if (preg_match('/.+(\+[0-9A-Za-z-]*)$/', $prettyVersion, $match)) {
                        $uniqueName .= $match[1];
                    }
                }

                // add matching package if not yet selected
                if (! isset($this->selected[$uniqueName])) {
                    if ($isRoot === false || $this->onlyDependencies === false) {
                        if ($verbose) {
                            $this->output->writeln('Selected '.$package->getPrettyName().' ('.$prettyVersion.')');
                        }
                        $this->selected[$uniqueName] = $package;
                    }

                    $required = $this->getRequired($package, $isRoot);
                    // append non-platform dependencies
                    foreach ($required as $dependencyLink) {
                        $target = $dependencyLink->getTarget();
                        if (! PlatformRepository::isPlatformPackage($target)) {
                            $linkId = $target.' '.$dependencyLink->getConstraint();
                            // prevent loading multiple times the same link
                            if (! isset($depsLinks[$linkId])) {
                                if ($isRoot === false) {
                                    $links[] = $dependencyLink;
                                }
                                $depsLinks[$linkId] = $dependencyLink;
                            }
                        }
                    }
                }
            }

            next($links);
        }

        return $depsLinks;
    }

    /**
     * @return RepositoryInterface[]
     */
    private function getDepRepos(PartialComposer $composer): array
    {
        $repositories = [];

        if (\is_array($this->depRepositories)) {
            $repositoryManager = $composer->getRepositoryManager();

            foreach ($this->depRepositories as $index => $config) {
                $name = \is_int($index) && isset($config['url']) ? $config['url'] : $index;
                $type = $config['type'] ?? '';
                $repositories[$index] = $repositoryManager->createRepository($type, $config, $name);
            }
        }

        return $repositories;
    }

    /**
     * @return PackageInterface[]
     */
    private function getPackages(RepositoryInterface $repo): array
    {
        $packages = [];

        if (! $this->hasFilterForPackages()) {
            return $repo->getPackages();
        }

        foreach ($this->packagesFilter as $filter) {
            $packages += $repo->findPackages($filter);
        }

        return $packages;
    }

    /**
     * @return Link[]
     */
    private function getRequired(PackageInterface $package, bool $isRoot): array
    {
        $required = [];

        if ($this->requireDependencies) {
            $required = $package->getRequires();
        }

        if (($isRoot || ! $this->requireDependencyFilter) && $this->requireDevDependencies) {
            $required = array_merge($required, $package->getDevRequires());
        }

        return $required;
    }

    /**
     * @param  RepositoryInterface[]|ConfigurableRepositoryInterface[]  $repositories
     * @return RepositoryInterface[]|ConfigurableRepositoryInterface[]
     */
    private function filterRepositories(array $repositories): array
    {
        return array_filter(
            $repositories,
            function ($repository) {
                if (! ($repository instanceof ConfigurableRepositoryInterface)) {
                    return false;
                }

                $config = $repository->getRepoConfig();

                if (! isset($config['url'])) {
                    return false;
                }

                return in_array($config['url'], $this->repositoriesFilter, true);
            }
        );
    }

    /**
     * @param  RepositoryInterface[]|ConfigurableRepositoryInterface[]  $repositories
     * @return RepositoryInterface[]|ConfigurableRepositoryInterface[]
     */
    private function filterPackages(array $repositories): array
    {
        $packages = $this->packagesFilter;

        return array_filter(
            $repositories,
            static function ($repository) use ($packages) {
                if (! ($repository instanceof ConfigurableRepositoryInterface)) {
                    return false;
                }

                $config = $repository->getRepoConfig();

                // We need name to be set on repo config as it would otherwise be too slow on remote repos (VCS, ..)
                if (! isset($config['name']) || ! in_array($config['name'], $packages)) {
                    return false;
                }

                return true;
            }
        );
    }
}
