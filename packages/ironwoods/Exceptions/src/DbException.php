<?php

declare(strict_types=1);

namespace Ironwoods\Exceptions;

use Exception;

class DbException extends Exception
{

    public function __construct(
        string $message = 'Error en la Base de Datos',
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
