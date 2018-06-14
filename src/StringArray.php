<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class StringArray extends PrimitiveTypeArray {

    protected function validate($value): bool {
        return \is_string($value);
    }

    public function current() : string {
        return parent::current();
    }
}