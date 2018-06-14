<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class IntegerArray extends PrimitiveTypeArray {

    public function current(): int {
        return parent::current();
    }

    public function validate($value): bool {
        return \is_int($value);
    }
}