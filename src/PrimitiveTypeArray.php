<?php

namespace Rockschtar\TypedArrays;

abstract class PrimitiveTypeArray extends TypedArray
{
    protected function isDuplicate(mixed $value): bool
    {

        foreach ($this as $item) {
            if ($item === $value) {
                return true;
            }
        }

        return false;
    }

    final public function getType(): string
    {
        return '';
    }
}
