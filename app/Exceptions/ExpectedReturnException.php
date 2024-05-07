<?php

namespace App\Exceptions;

use Exception;

final class ExpectedReturnException extends Exception
{

    public function __construct(
        string $message = 'Retorno inesperado',
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
