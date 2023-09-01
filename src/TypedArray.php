<?php

namespace Rockschtar\TypedArrays;

use ArrayIterator;
use InvalidArgumentException;

abstract class TypedArray extends ArrayIterator
{
    protected bool $allowDuplicates = true;

    /**
     * TypedArray constructor.
     * @param mixed[] $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            if (!$this->validate($item)) {
                throw new InvalidArgumentException($item);
            }
        }

        parent::__construct($items);
    }

    abstract protected function getType(): string;

    protected function validate(mixed $value): bool
    {
        return is_a($value, $this->getType());
    }

    protected function isDuplicate(mixed $itemToValidate): bool
    {
        foreach ($this as $item) {
            if ($item === $itemToValidate) {
                return true;
            }
        }

        return false;
    }

    /**
     * @throws InvalidArgumentException
     */
    final public static function fromValues(mixed ...$values): self
    {
        return self::fromArray($values);
    }

    /**
     * @throws InvalidArgumentException
     * @param mixed[] $array
     */
    final public static function fromArray(array $array): self
    {
        $typedArray = self::create();

        foreach ($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;
    }

    final public static function create(): self
    {
        static $instance = null;

        $class = static::class;
        if ($instance === null) {
            $instance = new $class();
        }

        return $instance;
    }

    /**
     * @throws InvalidArgumentException
     */
    final public function append(mixed $value): void
    {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('');
        }

        if ($this->allowDuplicates === false && $this->isDuplicate($value)) {
            throw new InvalidArgumentException('Item already exists');
        }

        parent::append($value);
    }


    /**
     * @param mixed[] $values
     */
    final public static function map(array $values, callable $callable): self
    {

        $typedArray = self::create();

        $array = array_map($callable, $values);

        foreach ($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;
    }

    final public function allowDuplicates(bool $allow = true): void
    {
        $this->allowDuplicates = $allow;
    }
}
