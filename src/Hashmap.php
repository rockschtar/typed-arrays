<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

use Rockschtar\TypedArrays\Models\KeyValuePair;

class Hashmap extends TypedArray {

    public function current(): KeyValuePair {
        return parent::current();
    }

    public function getType(): string {
        return KeyValuePair::class;
    }

    public function add($key, $value): Hashmap {
        $this->append(new KeyValuePair($key, $value));
        return $this;
    }
}