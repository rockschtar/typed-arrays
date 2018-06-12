<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class NumericArray extends TypedArray {
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

    protected function isDuplicate($value): bool {
        return false;
    }
}