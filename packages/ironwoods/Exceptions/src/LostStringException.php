<?php

declare(strict_types=1);

namespace Ironwoods\Exceptions;

use Exception;

class LostStringException extends Exception
{

    public function __construct(
        string $message = 'Cadena de texto no encontrad@',
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
