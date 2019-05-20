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
	public function current() : DummyClass {
		parent::current();
	}

	protected function getType(): string {
		return DummyClass::class;
	}

	protected function isDuplicate($value): bool {
		return false;
	}
}