<?php

declare(strict_types=1);


dump('<h1>PHP ' . phpversion() . '</h1>');
dump('<h3>Starting app: ' . env('APP_NAME') . '</h3>');
dump('<hr><p>My name is: '. config('app.my_name_is', 'John Doe') . '</p>');
