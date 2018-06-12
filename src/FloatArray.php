<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class FloatArray extends TypedArray {

    public function current(): float {
        return parent::current();
    }

    protected function validate($value): bool {
        return \is_float($value);
    }

    protected function isDuplicate($value): bool {
        return false;
    }

}