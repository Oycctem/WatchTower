# Laravel Project Setup

Follow these steps to install and set up the project on your local environment.

## Requirements

- php >= 8.x
- Composer
- MySQL or any compatible database
- Node.js (for frontend assets)
- zip extension

## Installation Steps

### Clone the Repository

composer install
or
composer update

### Set Up Environment Variables
Copy the .env.example file to .env and update the values (such as database credentials).
cp .env.example .env

### Generate the application key:
php artisan key:generate

### Run Database Migrations and Seeders
To run migrations and seed the database with any necessary data, run:
php artisan migrate
php artisan db:seed

### Caching and Roles Setup
Cache icons for your project (if applicable):
php artisan icons:cache

### Compile Frontend Assets (if applicable)
If your project includes frontend assets, run the following:
npm install
npm run dev  # For development mode
npm run build  # For production

### Start the Application
To serve the project locally, run:
php artisan serve

### Additional Commands
#### Clear Cache:
php artisan cache:clear
