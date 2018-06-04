<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class IntegerArray extends TypedArray {

    public function current(): int {
        return parent::current();
    }

    public function validate($value): bool {
        return \is_numeric($value);
    }

    public function offsetGet($offset): int {
        return parent::offsetGet($offset);
    }
}