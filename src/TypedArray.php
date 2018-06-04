<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

abstract class TypedArray extends \ArrayIterator {

    /**
     * TypedArray constructor.
     * @param array $items
     * @throws \InvalidArgumentException
     */
    public function __construct(array $items) {
        foreach($items as $item) {
            if(!$this->validate($item)) {
                throw new \InvalidArgumentException($item);
            }
        }

        parent::__construct($items);
    }


    abstract protected function validate($value): bool;

    final public static function &init(): self {
        static $instance = null;
        /** @noinspection ClassConstantCanBeUsedInspection */
        $class = \get_called_class();
        if($instance === null) {
            $instance = new $class();
        }
        return $instance;
    }

    /**
     * @param array $array
     * @return self
     * @throws \InvalidArgumentException
     */
    final public static function fromArray(array $array) : self {
        $typedArray = self::init();

        foreach($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;
    }

    /**
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    final public function append($value): void {
        if(!$this->validate($value)) {
            throw new \InvalidArgumentException($value);
        }

        parent::append($value);
    }

    /**
     * @param mixed ...$values
     * @return self
     * @throws \InvalidArgumentException
     */
    final public static function fromValues(... $values) : self {
        return self::fromArray($values);
    }

}