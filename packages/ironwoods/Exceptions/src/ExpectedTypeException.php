<?php

namespace Ironwoods\Exceptions;

use Exception;

final class ExpectedTypeException extends Exception
{

    public function __construct(
        string $message = 'El tipo de dato no es el esperado',
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
