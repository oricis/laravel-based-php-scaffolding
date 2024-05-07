<?php

namespace App\Exceptions;

use Exception;

final class NotBetweenException extends Exception
{

    public function __construct(
        string $message = 'El valor|string no es un candidato válido',
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
