# About the project

This is a project for a church. it building a site with Laravel and React. Most of the backend will be built using react.

## Application Development Procedures

There are few step to follow to run the application.

1. CD into the application root directory with your command prompt/terminal/git bash.
2. Run `cp .env.example .env`.
3. Inside `.env` file, setup database, mail and other configurations.
4. Run `composer install`.
5. Run `php artisan key:generate` command.
6. Create a new database
7. Run `php artisan migrate:fresh --seed` command.
8. Run `php artisan serve` command.
9. If the error persist, run the following commands
- `php artisan migrate:fresh --seed`
- `php artisan config:clear`
- `php artisan key:generate`
- `php artisan config:clear`

## Spatie Media Configuration
This package can associate all sorts of files with Eloquent models. It provides a simple, fluent API to work with. 

Please check the link to setup spatie media library

Link: https://spatie.be/docs/laravel-medialibrary/v9/installation-setup
