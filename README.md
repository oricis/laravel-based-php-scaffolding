# README

This is a Laravel structure based scaffolding to use on Vanilla PHP projects.

## System requirements

You must to have ***Git*** and ***Composer*** installed in your system.
Furthermore you will need ***PHP***, preferable the version 8.1 or superior,
and ***Apache server*** or similar installed and working to run the app.

## How to install

Go to the directory where you placed the PHP applications and clone the repo:

    git clone https://github.com/oricis/laravel-based-php-scaffolding.git

Set the appropriate owner and group to the project, f.e. in my case:

    sudo chown orici:www-data laravel-based-php-scaffolding -R

Enter to the project directory and install composer:

    cd laravel-based-php-scaffolding
    composer install

## Run the app

You can run your app in your local web browser, the URI depends where
you have your PHP projects, in my case I use:

    http://localhost/PHP/laravel-based-php-scaffolding/public/

By convenience, you can now rename your project directory and
[create a virtual host](https://github.com/oricis/notes/blob/master/contents/lamp/lamp-settings.md#create-virtual-hosts).

## Run checks/tests

Check code with PHPStan (app & public on max level):

    ./vendor/bin/phpstan analyze --level 9 public app config

To run the unitary tests use:

    vendor/bin/phpunit tests/Unit/Services/ChocoBilly --color
    vendor/bin/phpunit tests/Unit/Services/DnaChocobos --color

***

#### [See the app docs here)](./docs/main.md)

#### [Visit the author website here](https://www.ironwoods.es)

***

Copyright (c) 2024 Moisés Alcocer
