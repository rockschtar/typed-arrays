<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

use Rockschtar\TypedArrays\Models\KeyValuePair;

class Hashmap extends TypedArray {

    protected function validate($value): bool {
        return is_a($value, KeyValuePair::class);
    }

    protected function isDuplicate($value): bool {
        return false;
    }
}