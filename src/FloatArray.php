<?php
/**
 * @author: StefanHelmer
 */

namespace Rockschtar\TypedArrays;

class FloatArray extends PrimitiveTypeArray {
	public function current(): float {
		return parent::current();
	}

	final protected function validate($value): bool {
		return \is_float($value);
	}

}