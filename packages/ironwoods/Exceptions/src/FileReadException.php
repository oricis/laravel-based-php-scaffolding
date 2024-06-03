<?php

namespace Ironwoods\Exceptions;

use Exception;

final class FileReadException extends Exception
{

    public function __construct(
        string $message = 'Error de lectura de fichero',
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
