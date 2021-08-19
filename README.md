# Product catalog

Application to track their product inventory with a catalog system as a REST API so that they can check it on their mobile or desktop applications.

## Installation

If you want to run docker use command, uses [Laravel Sail](https://laravel.com/docs/8.x/sail)
and refer config file ```docker-compose.yml```

```bash 
./vendor/bin/sail up
```

## Usage

```bash
php artisan migrate // Database migration

php artisan db:seed // Database seed
```

## Code
Models are in ```App/Entities```

## Routes

Categories
```
api/categories GET - all categories
```

Products
```
api/products GET - all products
api/products/{id} GET - get product
api/products POST - store product [auth]
api/products/{id} PUT - update product [auth]
api/products/{id} DELETE - delete product [auth]
```

## Unit testing
Testing ```php artisan test```

it used separate database, please refer ```.env.testing```

added postman collection file to the code, might need to setup ```base_url``` 
