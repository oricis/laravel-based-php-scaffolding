# App docs

## Available helpers

- asset(string $path): string
- config(string $key, mixed $default = null):? string
- env(string $key, mixed $default = null):? string

### Get application paths

- app_path(): string
- base_path(): string
- config_path(): string
- public_path(): string
- resources_path(): string
- storage_path(): string


## Files tree

    laravel-based-php-scaffolding/
        |-- .env
        |-- .gitignore
        |-- License.txt
        |-- README.md
        |-- app/
        │    |-- Helpers/
        │    │    |-- .gitkeep
        │    │    |-- App/
        │    │    │    |-- .gitkeep
        │    │    |-- core.php
        │    │    |-- loader.php
        │    |-- Services/
        │         |-- .gitkeep
        |-- composer.json
        |-- composer.lock
        |-- config/
        │    |-- app.php
        │    |-- init.php
        |-- docs/
        │    |-- main.md
        |-- packages/
        |-- phpstan.neon
        |-- public/
        │    |-- .htaccess
        │    |-- favicon.ico
        │    |-- index.php
        │    |-- robots.txt
        |-- resources/
        │    |-- views/
        │         |-- app.php
        |-- storage/
        │    |-- logs/
        │    │    |-- .gitkeep
        │    |-- maintenance.php
        │    |-- output/
        │         |-- .gitkeep
        |-- tests/

***
***

[Go to README](../README.md)
