<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

abstract class TypedArray extends \ArrayIterator {
	private $allow_duplicates = true;

	/**
	 * TypedArray constructor.
	 *
	 * @param array $items
	 *
	 * @throws \InvalidArgumentException
	 */
	final public function __construct(array $items = []) {
		foreach($items as $item) {
			if(!$this->validate($item)) {
				throw new \InvalidArgumentException($item);
			}
		}

		parent::__construct($items);
	}

	/**
	 * @param $value
	 *
	 * @return bool
	 */
	protected function validate($value): bool {
		return is_a($value, $this->getType());
	}

	abstract protected function getType(): string;

	/**
	 * @param mixed ...$values
	 *
	 * @return static
	 * @throws \InvalidArgumentException
	 */
	final public static function fromValues(... $values): self {
		return self::fromArray($values);
	}

	/**
	 * @param array $array
	 *
	 * @return static
	 * @throws \InvalidArgumentException
	 */
	final public static function fromArray(array $array): self {
		$typedArray = self::init();

		foreach($array as $item) {
			$typedArray->append($item);
		}

		return $typedArray;
	}

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
	 * @param mixed $value
	 *
	 * @throws \InvalidArgumentException
	 */
	final public function append($value): void {
		if(!$this->validate($value)) {
			throw new \InvalidArgumentException('');
		}

		if($this->allow_duplicates === false && $this->isDuplicate($value)) {
			throw new \InvalidArgumentException('Item already exists');
		}

		parent::append($value);
	}

	abstract protected function isDuplicate($value): bool;

	final public function allowDuplicates($allow = true): void {
		$this->allow_duplicates = $allow;
	}

    /**
     * @param array $values
     * @param callable $callable
     * @return static
     */
    final public static function map(array $values, callable $callable): self {

        $typedArray = self::init();

        $array = array_map($callable, $values);

        foreach($array as $item) {
            $typedArray->append($item);
        }

        return $typedArray;

    }
}