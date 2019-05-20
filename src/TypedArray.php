<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

use ArrayIterator;
use InvalidArgumentException;

abstract class TypedArray extends ArrayIterator {

    /**
     * @var bool
     */
    protected $allowDuplicates = true;

    /**
     * TypedArray constructor.
     * @param array $items
     * @throws InvalidArgumentException
     */
    public function __construct(array $items = []) {
        foreach ($items as $item) {
            if (!$this->validate($item)) {
                throw new InvalidArgumentException($item);
            }
        }

        parent::__construct($items);
    }

    /**
     * @return string
     */
    abstract protected function getType(): string;

    /**
     * @param $value
     * @return bool
     */
    protected function validate($value): bool {
        return is_a($value, $this->getType());
    }

    /**
     * @param mixed $itemToValidate
     * @return bool
     */
    protected function isDuplicate($itemToValidate): bool {
        foreach ($this as $item) {
            if ($item === $itemToValidate) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param mixed ...$values
     * @return static
     * @throws InvalidArgumentException
     */
    final public static function fromValues(... $values): self {
        return self::fromArray($values);
    }

    /**
     * @param array $array
     * @return static
     * @throws InvalidArgumentException
     */
    final public static function fromArray(array $array): self {
        $typedArray = self::create();

        foreach ($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;
    }

    /**
     * @return TypedArray
     */
    final public static function create(): self {
        static $instance = null;

        $class = static::class;
        if ($instance === null) {
            $instance = new $class();
        }

        return $instance;
    }

    /**
     * @param mixed $value
     * @throws InvalidArgumentException
     */
    final public function append($value): void {
        if (!$this->validate($value)) {
            throw new InvalidArgumentException('');
        }

        if ($this->allowDuplicates === false && $this->isDuplicate($value)) {
            throw new InvalidArgumentException('Item already exists');
        }

        parent::append($value);
    }

    /**
     * @param array $values
     * @param callable $callable
     * @return static
     */
    final public static function map(array $values, callable $callable): self {

        $typedArray = self::create();

        $array = array_map($callable, $values);

        foreach ($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;

    }

    /**
     * @param bool $allow
     */
    final public function allowDuplicates($allow = true): void {
        $this->allowDuplicates = $allow;
    }
}