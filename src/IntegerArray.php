<?php

namespace Rockschtar\TypedArrays;

use function is_int;

class IntegerArray extends PrimitiveTypeArray
{
    public function __construct(int ...$items)
    {
        parent::__construct($items);
    }

    public function current(): int
    {
        return parent::current();
    }

    public function validate(mixed $value): bool
    {
        return is_int($value);
    }
}
