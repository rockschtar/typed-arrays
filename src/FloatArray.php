<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class FloatArray extends PrimitiveTypeArray {

    public function __construct(float ...$items) {
        parent::__construct($items);
    }

	public function current(): float {
		return parent::current();
	}

	final protected function validate($value): bool {
		return \is_float($value);
	}

    public static function fromString(String $string, $glue = ','): FloatArray {

        $exploded_string = explode($glue, $string);

        $integer_array = array_map(function ($string_value) {
            return (float)$string_value;
        }, $exploded_string);

        return self::fromArray($integer_array);
    }

}