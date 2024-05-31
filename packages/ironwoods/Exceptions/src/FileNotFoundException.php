<?php

namespace Ironwoods\Exceptions;

use Exception;

final class FileNotFoundException extends Exception
{

    public function __construct(
        string $message = 'Fichero NO encontrado',
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
