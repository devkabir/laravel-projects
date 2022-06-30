# Laravel API with file upload

This is a wine collections that allows you to upload images and get images via REST API. The images are stored in the /public/wines folder. Also you can upload your profile picture. 

Authentication and authorization is implemented. Auth process is handled by the [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum#how-it-works) library.

## Package Dependencies
- [API Documentation](https://github.com/rakutentech/laravel-request-docs)

## Installation
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## Usage
Go to the [API Documentation](/docs) to see how to use the API. 


