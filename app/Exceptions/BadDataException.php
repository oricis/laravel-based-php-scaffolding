<?php

namespace App\Exceptions;

use Exception;

final class BadDataException extends Exception
{

    public function __construct(
        string $message = 'Unexpected data type',
        int $code = 0
    )
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return $this->getMessage();
    }
}
