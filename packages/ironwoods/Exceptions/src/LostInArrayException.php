<?php

declare(strict_types=1);

namespace Ironwoods\Exceptions;

use Exception;

class LostInArrayException extends Exception
{

    public function __construct(
        string $message = 'Valor inexistente en el array',
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
