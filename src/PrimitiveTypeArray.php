<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 17:46
 */

namespace Rockschtar\TypedArrays;

abstract class PrimitiveTypeArray extends TypedArray{

	protected function isDuplicate($value): bool {

		foreach($this as $item) {
			if($item === $value) {
				return true;
			}
		}

		return false;
	}

	final public function getType(): string {
		return '';
	}
}