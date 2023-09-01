<?php

/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays\Models;

class KeyValuePair
{
    public function __construct(private mixed $key, private mixed $value)
    {
    }

    public function getKey(): mixed
    {
        return $this->key;
    }

    public function setKey(mixed $key): void
    {
        $this->key = $key;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }
}
