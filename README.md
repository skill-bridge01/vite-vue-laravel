# Canary with i18n @ Laravel, Filament-cms-website-plugin, Vue, Vite, Pinia.

## Laravel backend:

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Filament-cms-website-plugin

[Filament-cms documentation](https://filamentphp.com/plugins/solution-forest-cms-website)

## Vue frontend:

- [Vue 3](https://vuejs.org/)
- [Vite](https://vitejs.dev/) for assets build
- [Pinia](https://pinia.vuejs.org/) for data store
- [ky](https://github.com/sindresorhus/ky) for fetching data
- Simple SPA with basic routes as example
- [Cache/expiration](https://github.com/volkar/vue-pinia-cache-composables) system for api requests

## Installation

1. Edit your config/database.php file to setup database connection

2. Update and install composer packages
```
composer update
```
3. Copy .env.example to .env
```
cp .env.example .env
```
4. Generate keys
```
php artisan key:generate
```
5. Edit your .env file to setup database connection and site address `APP_URL`
6. Create database schema & seed it
```
php artisan migrate:refresh --seed
```
7. Link public folder and storage folder. If the link already exists, first, remove the storage folder in public folder.
```
php artisan storage:link
```
8. Create Filament's admin account(Name, Email, Password):
```
php artisan make:filament-user
```
9. Start Filament's admin account:
```
http://localhost:8000/admin
```
10. Install all node.js dependencies
```
npm install
```
11. Run Vite dev server
```
npm run dev
```
12. Start Vue Frontend:
```
http://localhost:8000
```
