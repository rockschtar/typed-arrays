<?php

namespace Rockschtar\TypedArrays;

use function is_float;

class FloatArray extends PrimitiveTypeArray
{
    public function __construct(float ...$items)
    {
        parent::__construct($items);
    }

    public function current(): float
    {
        return parent::current();
    }

    final protected function validate(mixed $value): bool
    {
        return is_float($value);
    }
}
