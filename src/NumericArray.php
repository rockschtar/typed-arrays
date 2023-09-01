<?php

namespace Rockschtar\TypedArrays;

class NumericArray extends PrimitiveTypeArray
{
    public function current(): float | int
    {
        return parent::current();
    }

    protected function validate(mixed $value): bool
    {
        return is_numeric($value);
    }
}
