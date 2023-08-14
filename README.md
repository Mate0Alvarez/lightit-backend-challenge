<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Backend Laravel Challenge

## Description

This repository contains a project created for an interview challenge.

## Run project

You can run the project by downloading it as .zip or cloning it with:

```
git clone https://github.com/Mate0Alvarez/lightit-backend-challenge.git
cd lightit-backend-challenge
```

Create a `.env` file in the `src/laravel` folder and configure the Laravel environment variables. Here's an example:

```
APP_NAME=LightitChallenge
APP_ENV=local
APP_KEY=base64:your-generated-key
...
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lightit_challenge_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_password
```

Open a terminal in the project root and execute the following command to start the containers:

```
docker-compose up -d
```

Install Laravel dependencies. Access the web container with:

```
docker exec -it laravel-app /bin/bash
```

Inside the container, run:

```
composer install
```

Run migrations and seeds:

```
php artisan migrate
php artisan db:seed
```

Access your application in the browser: http://localhost:8080

## Stopping and Cleaning Up

If you want to stop and remove the containers, you can run:

```
docker-compose down
```

## Additional comments

If you want you test the email sending in a development environment by implementing a library like `Mailtrap`, be sure of configure the environment variables in the `.env` file:

```
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
```