<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class IntegerArray extends PrimitiveTypeArray {
    public function __construct(int ...$items) {
        parent::__construct($items);
    }

    public function current(): int {
        return parent::current();
    }

    public function validate($value): bool {
        return \is_int($value);
    }

    public static function fromString(String $string, $glue = ','): IntegerArray {

        $exploded_string = explode($glue, $string);

        $integer_array = array_map(function ($string_value) {
            return (int)$string_value;
        }, $exploded_string);

        return self::fromArray($integer_array);
    }

}