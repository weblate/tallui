# TallUI Monorepo

This is the TallUI Monorepo containing all packages and the Laravel dev app for instant development with Laravel Sail or Laragon.

```bash
# Use the prepared environment
cp .env.example .env

# Build
composer install

# Run Sail
./vendor/bin/sail up

# Run Vite (in Ubuntu, not in Sail container)
npm install
npm run dev

# Rebuild the sail config if needed
./vendor/bin/sail down --rmi all -v
php artisan sail:install

# Remove broken symlinks if needed
rm -Rf vendor/usetall
```

## Custom

You can require custom packages without overwriting the main composer.json:

```bash
cd _custom
cp composer.json-example composer.json
```

Now clone your package as a subrepo into _custom and edit composer.json to your needs:

```json
{
    "name": "usetall/tallui-custom",
    "description": "The TallUI Monorepo - a merged Composer.json for custom packages.",
    "keywords": ["framework", "laravel", "package", "custom", "composer", "monorepo"],
    "license": "MIT",
    "repositories": [
        {
            "type": "path",
            "url": "./_custom/package"
        }
    ],
    "require": {
        "custom/package": "dev-main"
    },
    "minimum-stability": "dev",
    "prefer-stable": true
}
```

As with composer, you can require multiple packages.


## Development

- Do `npm run build` before committing because automated tests on GitHub needs a working vite-manifest
- Do `php artisan migrate --database=sqlite` to reflect changes to the test-database
- Use https://marketplace.visualstudio.com/items?itemName=adrolli.tallui-laravel-livewire-tailwind with VS Code
- Use https://github.com/usetall/tallui-package-builder to create your own packages
- Please see [CONTRIBUTING](CONTRIBUTING.md) for details. 


## Todo

- Check Larastan and https://phpstan.org/user-guide/baseline to get rid of errors
- Fix workflows of all packages
- Fix dev-components
- Scaffold all current packages like admin, users, backup ...
- Get all packages running in composer
- Exclude all packages from main composer file and move them to custom will allow own configuration, remember to adjust README
- Move all Tests to dev or test branch
- Re-enable branch protection on main
- Move Scrutinizer to dev test branch
- Branching now: feature -> dev -> test? -> main, dont forget README
- Wire the full-app with composer
- Start with Dashboard and Tailwind conf
- Create Coming Soon page
- Deploy it on Vapor, Cloudways and Shared Hosting
