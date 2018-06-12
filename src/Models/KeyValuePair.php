<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays\Models;

class KeyValuePair {

    private $key;

    private $value;

    /**
     * @return mixed
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key): void {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void {
        $this->value = $value;
    }

}