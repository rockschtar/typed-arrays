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
}