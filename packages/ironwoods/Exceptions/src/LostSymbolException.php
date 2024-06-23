<?php

declare(strict_types=1);

namespace Ironwoods\Exceptions;

use Exception;

class LostSymbolException extends Exception
{

    public function __construct(
        string $message = 'Símbolo no encontrado',
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
