<?php

namespace Ironwoods\Exceptions;

use Exception;

final class RequiredDataException extends Exception
{

    public function __construct(
        string $message = 'Faltan datos requeridos',
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
