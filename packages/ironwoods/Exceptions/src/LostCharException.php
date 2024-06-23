<?php

declare(strict_types=1);

namespace Ironwoods\Exceptions;

use Exception;

class LostCharException extends Exception
{

    public function __construct(
        string $message = 'Caracter no encontrado',
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
