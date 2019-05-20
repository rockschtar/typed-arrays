<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 19:44
 */

namespace Rockschtar\TypedArrays\Test\Dummy;

use Rockschtar\TypedArrays\TypedArray;

class DummyTypedArray extends TypedArray {
    /**
     * Overrides parent method for type hints
     * @return DummyClass
     */
    public function current(): DummyClass {
        return parent::current();
    }

    /**
     * Returns the type of the typed array
     * @return string
     */
    protected function getType(): string {
		return DummyClass::class;
	}
}