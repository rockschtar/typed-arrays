<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class StringArray extends TypedArray {

    protected function validate($value): bool {
        return \is_string($value);
    }

    public function current() : string {
        parent::current();
    }

    protected function isDuplicate($value): bool {
        return false;
    }
}