<?php

namespace Rockschtar\TypedArrays;

use function is_string;

class StringArray extends PrimitiveTypeArray
{
    public function __construct(string ...$items)
    {
        parent::__construct($items);
    }

    protected function validate(mixed $value): bool
    {
        return is_string($value);
    }

    public function current(): string
    {
        return parent::current();
    }
}
