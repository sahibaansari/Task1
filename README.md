# Laravel Contact Form Project

A complete Laravel application with contact form, admin dashboard, and REST API.

aravel-contact-project/
├── app/
│ ├── Http/Controllers/
│ │ ├── ContactController.php # Form handling
│ │ ├── HomeController.php # Homepage
│ │ └── Admin/ # Admin controllers
│ │ └── ContactAdminController.php
│ └── Models/
│ └── Contact.php # Contact model
├── database/
│ └── migrations/ # Database migrations
├── resources/views/
│ ├── client/ # Frontend views
│ └── admin/ # Admin dashboard views
├── routes/
│ ├── web.php # Web routes
│ └── api.php # API routes
└── public/ # Assets



## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/laravel-contact-project.git
cd laravel-contact-project

## Install dependencies

composer install
npm install

## Copy environment file

 cp .env.example .env

 ## Generate application key
  
  php artisan key:generate

  ## Configure database in .env

  DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password


## Run migrations

php artisan migrate

## Link storage

php artisan storage:link

## Start development server

php artisan serve


## Access URLs

    Homepage: http://localhost:8000

    Admin Dashboard: http://localhost:8000/admin/dashboard

    Contact Messages: http://localhost:8000/admin/contacts

    API Endpoints: http://localhost:8000/api/contacts


 ##   API Documentation

 Method	Endpoint	                    Description
GET	    /api/contacts	                List all contacts
POST	/api/contacts	                Create new contact
GET	    /api/contacts/{id}	            Get single contact
PUT	    /api/contacts/{id}	            Update contact
DELETE	/api/contacts/{id}	            Delete contact


## Technologies Used

    Backend: Laravel 10, PHP 8.1

    Database: MySQL

    Frontend: HTML5, CSS3, JavaScript, Bootstrap 5

    API: RESTful API