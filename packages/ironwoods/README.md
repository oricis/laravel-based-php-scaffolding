# Ironwoods package

Here you can find:

 - Exceptions
 - Services to perform different tasks, f.e. array contents transformations
 - A collection of useful helper functions, some of them PHP native from PHP 8
or included in the Laravel Framework.

This package is:
 - Free use (BSD 3-Clause License).
 - Zero dependencies.
 - Easy to use.

## How to load?

There are two ways to add the package to your project:
with *Composer* or with *requires*.

To ***load with Composer*** including the "ironwoods" contents in the
"packages" directory and edit your "composer.json":

 - On the "autoload" / "psr-4" section add:
    "Ironwoods\\": "packages/ironwoods/",
    "Ironwoods\\Exceptions\\": "packages/ironwoods/Exceptions/src/"
 - On the: "autoload" / "files" section add:
    "packages/ironwoods/Helpers/loader.php"

Example:

    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "Ironwoods\\": "packages/ironwoods/",
            "Ironwoods\\Exceptions\\": "packages/ironwoods/Exceptions/src/"
        },
        "files": [
            "app/Helpers/loader.php",
            "packages/ironwoods/Helpers/loader.php"
        ]
    },

To ***load without Composer*** add the next require on the top of your entry
file (assuming that the entry file is "public/index.php"):

    require_once dirname(__DIR__) . '/packages/ironwoods/alternative-loader.php';

***

## Files tree

    ironwoods/
      ├─ Exceptions/
      │  ├─ LICENSE
      │  ├─ README.md
      │  ├─ composer.json
      │  ├─ src/
      │  │  ├─ BadDataException.php
      │  │  ├─ ExpectedReturnException.php
      │  │  ├─ ExpectedTypeException.php
      │  │  ├─ FileNotFoundException.php
      │  │  ├─ FileReadException.php
      │  │  ├─ NotBetweenException.php
      │  │  ├─ RequireActionException.php
      │  │  └─ RequiredDataException.php
      │  └─ tests/
      ├─ Helpers/
      │  ├─ .gitignore
      │  ├─ Arrays/
      │  │  └─ arrays.php
      │  ├─ Dates/
      │  │  └─ dates.php
      │  ├─ Files/
      │  │  └─ files.php
      │  ├─ LICENSE
      │  ├─ README.md
      │  ├─ Strings/
      │  │  └─ strings.php
      │  ├─ Traces/
      │  │  ├─ core.php
      │  │  └─ traces.php
      │  ├─ composer.json
      │  ├─ composer.lock
      │  ├─ loader.php
      │  ├─ mix.php
      │  └─ tests/
      │     └─ Unit/
      │        └─ Traces/
      │           ├─ CoreTest.php
      │           └─ TracesTest.php
      ├─ README.md
      ├─ Services/
      │  ├─ Array/
      │  │  ├─ ArrCastService.php
      │  │  └─ ArrTransformerService.php
      │  ├─ File/
      │  │  ├─ DataReaderService.php
      │  │  └─ DataWriterService.php
      │  ├─ LICENSE
      │  ├─ README.md
      │  ├─ composer.json
      │  └─ tests/
      │     ├─ Array
      │     └─ File
      └─ alternative-loader.php

***

Copyright (c) Moisés Alcocer, 2024. https://www.ironwoods.es
