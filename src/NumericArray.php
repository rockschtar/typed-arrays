<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class NumericArray extends PrimitiveTypeArray {
    /** @noinspection SenselessProxyMethodInspection */
    /**
     * @return float|int
     */
    public function current()  {
        return parent::current();
    }

    protected function validate($value): bool {
        return is_numeric($value);
    }

    public static function fromString(String $string, $glue = ','): NumericArray {

        $exploded_string = explode($glue, $string);

        $integer_array = array_map(function ($string_value) {

            if(\is_float($string_value)) {
                return(float)$string_value;
            }

            if(\is_int($string_value)) {
                return(int)$string_value;
            }

            return $string_value;
        }, $exploded_string);

        return self::fromArray($integer_array);
    }

}