# TallUI Monorepo

This is just a dev app, tested with Laravel Sail and Laragon.

```
// Use the default environment for sail
cp .env.example .env

// Build
composer install

// Run Sail
./vendor/bin/sail up

// Run Vite (in Ubuntu, not in Sail container)
npm install
npm run dev

// Rebuild the sail config if needed
./vendor/bin/sail down --rmi all -v
php artisan sail:install

// Remove broken symlinks if needed
rm -Rf vendor/usetall
```

## Test

- Do `npm run build` when committing changes, because automated tests on GitHub needs a vite-manifest.
- Do `php artisan migrate --database=sqlite` to reflect changes to the test-database
