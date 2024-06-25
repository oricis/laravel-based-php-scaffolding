<?php

namespace Ironwoods\Exceptions;

use Exception;

final class RequiredActionException extends Exception
{

    public function __construct(
        string $message = 'Acción requerida NO completada',
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
