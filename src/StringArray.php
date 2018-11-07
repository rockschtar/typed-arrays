<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class StringArray extends PrimitiveTypeArray {

    public function __construct(String ...$items) {
        parent::__construct($items);
    }

    protected function validate($value): bool {
        return \is_string($value);
    }

    public function current() : string {
        return parent::current();
    }

    public static function fromString(String $string, $glue = ','): StringArray {

        $exploded_string = explode($glue, $string);

        $integer_array = array_map(function ($string_value) {
            return (string)$string_value;
        }, $exploded_string);

        return self::fromArray($integer_array);
    }
}