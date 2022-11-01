<p align="center">
    <img src="_others/tallui-art/tallui-logo.svg" width="100" alt="TallUI Logo">
    <br><br>
    <img src="_others/tallui-art/tallui-textlogo.svg" width="110" alt="TallUI Textlogo">
</p>
<br>

<p align="center">
    <a href="https://github.com/usetall/tallui/actions/workflows/run-tests.yml">
        <img alt="PEST Tests" src="https://img.shields.io/github/workflow/status/usetall/tallui/run-tests?label=PestPHP">
    </a>
    <a href="https://github.com/usetall/tallui/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain">
        <img alt="Laravel PINT PHP Code Style" src="https://img.shields.io/github/workflow/status/usetall/tallui/Fix%20PHP%20code%20style%20issues?label=Laravel Pint">
    </a>
    <a href="https://github.com/usetall/tallui/actions?query=workflow%3A"PHPStan"+branch%3Amain">
        <img alt="PHPStan Level 5" src="https://img.shields.io/github/workflow/status/usetall/tallui/PHPStan?label=PHPStan">
    </a>
    <a href="https://scrutinizer-ci.com/g/usetall/tallui/?branch=main">
        <img alt="Scrutinizer Code Quality" src="https://scrutinizer-ci.com/g/usetall/tallui/badges/quality-score.png?b=main">
    </a>
    <a href="https://github.com/usetall/tallui/blob/main/LICENSE.md">
        <img alt="License" src="https://img.shields.io/github/license/usetall/tallui">
    </a>
</p>

# TallUI Monorepo

This is the TallUI Monorepo containing all packages and the Laravel dev app.


## Packages

TallUI packages are categorized in 

- [_components](./_components/README.md) - Laravel packages only packed with Blade and Livewire components
- [_data](./_data/README.md) - Laravel packages only used as data-provider (model, migration, seeding)
- [_icons](./_icons/README.md) - Laravel packages only with SVG icons, compatible with Blade Icons
- [_others](./_others/README.md) - Other Laravel packages or assisting repos like TallUI Package Builder
- [_packages](./_packages/README.md) - Full blown Laravel packages like TallUI Core or Admin Panel
- [_themes](./_themes/README.md) - Themes for the admin (backend) or website (frontend)
- [_themes](./_themes/README.md)/[website](./_themes/website/README.md) - Themes for the TallUI Website

Packages are automatically updated to their own read-only repos when pushed to [main].


### Add a new package:

- Create a new package from TallUI Package Builder template
- Copy contents into one of the _subfolder of the monorepo
- Add the package to the appropriate monorepo-split-action
- Add the package to _custom/composer.json-example and composer-tests.json
- Add the package to the README.md in the appropriate _subfolder
- Add the package to _app/***/composer.json, if the package is stable


## Installation

The Laravel dev app is made for instant development with Laravel Sail or Laragon. 

```bash
# Use the prepared composer.json
cp _custom/composer.json-example _custom/composer.json

# Use the matching environment for sail or laragon
cp .env.sail .env
cp .env.laragon .env

# Build
composer install

# Run Sail, alternatively start Laragon
./vendor/bin/sail up

# Run Vite (in Ubuntu, not in Sail container)
npm install
npm run dev

# Rebuild the sail config if needed
./vendor/bin/sail down --rmi all -v
php artisan sail:install

# Remove broken symlinks 
# switching from Laragon to Sail for example
rm -Rf vendor/usetall
```


## Custom

As you might want to develop with a custom set of TallUI packages or require your own packages, we included a second composer.json. This composer-file requires all TallUI packages and can be easily edited or extended without overwriting the main composer.json.

```bash
cd _custom
cp composer.json-example composer.json
```

To customize the set of TallUI packages, simply delete the packages you don't want to load from the require-section, ```composer update``` afterwards.

If you want to include custom packages you can clone one or more packages as subrepos into _custom and add them to _custom/composer.json like so:

```json
    "repositories": [
        {
            "type": "path",
            "url": "./_custom/package"
        }
    ],
    "require": {
        "custom/package": "dev-main"
    },
```


## Development

- Do `npm run build` before committing because automated tests on GitHub needs a working vite-manifest
- Do `php artisan migrate --database=sqlite` to reflect changes to the test-database
- Use https://marketplace.visualstudio.com/items?itemName=adrolli.tallui-laravel-livewire-tailwind with VS Code
- Use https://github.com/usetall/tallui-package-builder to create your own packages
- Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


### Branching

- ```main``` is the current stable version, branch-protected, auto-commits to all packages, deployed live
- ```test``` is the branch for tests and Scrutinizer, deployed on staging, merged to main
- ```dev``` active development with tests and code fixing, merged to test
- ```feature/...``` prefix all other dev-branches, merge to dev


## Testing

We test TallUI using:

- Monorepo
  - [Larastan](https://github.com/nunomaduro/larastan), [PHPStan](https://phpstan.org/) Level 5
  - [Laravel Pint](https://laravel.com/docs/pint), PHP CS Fixer
  - [Scrutinizer](https://scrutinizer-ci.com/g/usetall/tallui/), [Codacy](https://app.codacy.com/gh/usetall/tallui/) and [Code climate](https://codeclimate.com/github/usetall/tallui) (testing)
- Packages
  - [Orchestra Testbench](https://orchestraplatform.readme.io/docs/testbench)
  - [Larastan](https://github.com/nunomaduro/larastan), [PHPStan](https://phpstan.org/) Level 5
  - [Laravel Pint](https://laravel.com/docs/pint), PHP CS Fixer
  - [Pest](https://pestphp.com/)

Please make sure you use the same tools in VS Code, our [VS Code Extension Pack](https://marketplace.visualstudio.com/items?itemName=adrolli.tallui-laravel-livewire-tailwind) covers this. Or do the checks manually like so:

- Use PHPStan before committing: ```./vendor/bin/phpstan analyse```, from a package: ```../../vendor/bin/phpstan analyse```
- Run Pest before committing: ```./vendor/bin/pest```, from a package: ```../../vendor/bin/pest```
- Run Pint before commiting: ```./vendor/bin/pint```, you guess it: ```../../vendor/bin/pint```


## Todo

- Translation
    - Finish the guides: https://hosted.weblate.org/guide/tallui/tallui-core-passwords/
    - Finish this README and Link to translation-readme ... as well as testing ...
    - Request Weblates free hosting with Link to http://next.tallui.io/, and information about the blog post and heco as potential customer
    - See https://blog.quickadminpanel.com/10-best-laravel-packages-for-multi-language-translations/ for translatable and routes package
    
- Finish READMEs
    - app-components readme, then the rest
    - add relevant things to builder
- Versioning
    - http://localhost:3000/_others/tallui-monorepo-tools/changelogger.php
    - Changelog action: Read-Only repos could not be changed
    - Semver - versioning how to
    - How to craft releases with changelog?
    - Use https://github.com/actions/create-release
    - See https://github.blog/2021-10-04-beta-github-releases-improving-release-experience/
    - See https://stefanzweifel.io/posts/2021/11/13/introducing-the-changelog-updater-action
- https://github.com/usetall/tallui/tree/dev/_components/tallui-app-components/.github/ISSUE_TEMPLATE
- Improve builder
  - Finish testing by creating a set of simple tests incl. 
    - the blade component
    - the livewire component
    - asset loading
    - service provider itself?
- _builder
  - Module Builder
  - Iconset Builder
  - Component Builder
  - Theme Builder
  - Package Builder
- Care for translations (add to all packages / builder?)
  - https://laravel.com/docs/9.x/localization
  - https://laravel-news.com/laravel-lang-translations
  - https://blog.quickadminpanel.com/10-best-laravel-packages-for-multi-language-translations/
  - https://hosted.weblate.org/projects/tallui/ + https://libretranslate.com/
  - Status, like https://rob006-software.github.io/flarum-translations/
- Scaffold website-package to output all components
- Scaffold admin-package
- Start with Dashboard and Tailwind conf (https://tailwindcss.com/docs/theme, see Theme-docs)
- Create Coming Soon page
- Get all packages running in composer
- Wire the full-app with composer
- Rebuild icons-package with Workflows, add to builder?
- Deploy it on Vapor, Cloudways and Shared Hosting
- Save the icons, dev-components, docs and other stuff

## Ideas

Blade / Livewire-Components
class=“ your_class“ => append attributes to default styles or theme styles
:class=”your_class” => overwrite all default styles and theme styles

See:
https://laracasts.com/discuss/channels/livewire/scoped-css-in-livewire-component
https://laravel.com/docs/9.x/blade#passing-data-to-components
https://laravel-livewire.com/docs/2.x/properties

Check https://tailwindcss.com/blog/tailwindcss-v3-2?utm_source=newsletter&utm_medium=email&utm_campaign=tailwind_v32_release_open_graph_image_generation_and_nextjs_conf_is_coming&utm_term=2022-10-20#multiple-config-files-in-one-project-using-config

- Sicherheitsfrage(n) oder z. B. Geburtsdatum - auch bei Zurücksetzen Mail
- Anmeldelink per Mail
- 3FA
- Datenschutz - automatische Löschung inaktiver Konten nach XX Tagen, Mail an Kunde zuvor - Grace period (Deaktivierung)

https://kutty.netlify.app/components/ - free TailwindCSS and AlpineJS Components

https://flowbite.com/ - commercial, only TailwindCSS, own JS-Lib

https://www.tailwindawesome.com/?price=free&technology=5

https://rappasoft.com/blog/a-sneak-peak-at-livewire-tables-v2

https://github.com/nunomaduro/larastan

https://github.com/devicons/devicon

https://github.com/miten5/larawind

https://github.com/spatie/laravel-translatable

https://accessible-colors.com/

https://razorui.com/pricing

https://github.com/vildanbina/livewire-wizard

https://laravel-news.com/migrator-gui-migration-manager-for-laravel






Package Builder

- ServiceProvider -  YEP
- Blade Component - YEP
- Livewire Component
- Custom Command
- Views (Blade / Livewire)
- Route
- Model
- Migration
- Seeder
- Middleware
- Facade
- Trait
- Controller
- Notification
- Exception
- Languages
- Jobs
- Config
- Faker
- Docs
- Tests
- Theme / Assets (Storage)

todos:

- rename to pgkname-blade-component
- pgkname-livewire-component
- assets
    - js mit ausgabe
    - css mit sichbarkeit
- tests für komponenten + assets

What the PHPStan?????

- Unterschiede Büro / Home?!?
- https://github.com/nunomaduro/larastan/blob/master/docs/custom-types.md

## Contributors

<!-- readme: adrolli,Reinhold-Jesse,collaborators,contributors,tallui-bot,bots -start -->
<table>
<tr>
    <td align="center">
        <a href="https://github.com/adrolli">
            <img src="https://avatars.githubusercontent.com/u/40421928?v=4" width="100;" alt="adrolli"/>
            <br />
            <sub><b>adrolli</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/reinhold-jesse">
            <img src="https://avatars.githubusercontent.com/u/88349887?v=4" width="100;" alt="reinhold-jesse"/>
            <br />
            <sub><b>reinhold-jesse</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/wp1111">
            <img src="https://avatars.githubusercontent.com/u/42349383?v=4" width="100;" alt="wp1111"/>
            <br />
            <sub><b>wp1111</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/azizovic12">
            <img src="https://avatars.githubusercontent.com/u/104441723?v=4" width="100;" alt="azizovic12"/>
            <br />
            <sub><b>azizovic12</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/KimSpeer">
            <img src="https://avatars.githubusercontent.com/u/98323532?v=4" width="100;" alt="KimSpeer"/>
            <br />
            <sub><b>KimSpeer</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/laravel-shift">
            <img src="https://avatars.githubusercontent.com/u/15991828?v=4" width="100;" alt="laravel-shift"/>
            <br />
            <sub><b>laravel-shift</b></sub>
        </a>
    </td></tr>
<tr>
    <td align="center">
        <a href="https://github.com/FMorlock">
            <img src="https://avatars.githubusercontent.com/u/99252924?v=4" width="100;" alt="FMorlock"/>
            <br />
            <sub><b>FMorlock</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/janakeks">
            <img src="https://avatars.githubusercontent.com/u/42347662?v=4" width="100;" alt="janakeks"/>
            <br />
            <sub><b>janakeks</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/tallui-bot">
            <img src="https://avatars.githubusercontent.com/u/106848579?v=4" width="100;" alt="tallui-bot"/>
            <br />
            <sub><b>tallui-bot</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/github-actions[bot]">
            <img src="https://avatars.githubusercontent.com/in/15368?v=4" width="100;" alt="github-actions[bot]"/>
            <br />
            <sub><b>github-actions[bot]</b></sub>
        </a>
    </td>
    <td align="center">
        <a href="https://github.com/dependabot[bot]">
            <img src="https://avatars.githubusercontent.com/in/29110?v=4" width="100;" alt="dependabot[bot]"/>
            <br />
            <sub><b>dependabot[bot]</b></sub>
        </a>
    </td></tr>
</table>
<!-- readme: adrolli,Reinhold-Jesse,collaborators,contributors,tallui-bot,bots -end -->

<a href="https://hosted.weblate.org/engage/tallui/">
<img src="https://hosted.weblate.org/widgets/tallui/-/open-graph.png" alt="Translation status" />
</a>
