<?php

declare(strict_types=1);


$funcName = 'isEmpty';
if (!function_exists($funcName)) {
    function isEmpty(mixed $value): bool
    {
        if (!is_numeric($value)
            && empty($value)) {
            return true; // [], '', null
        }
        if ($value === [''] // TODO: clear arrays with 0, nulls, empty strings
            || $value == 0) { // not empty with negative numbers
            return true;
        }
        if (is_object($value)) {
            return !get_class_vars(get_class($value));
        }

        return false;
    }
}
