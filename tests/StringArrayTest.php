<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 19:38
 */
namespace Rockschtar\TypedArrays\Test;

use Rockschtar\TypedArrays\Test\Dummy\DummyClass;
use Rockschtar\TypedArrays\Test\Models\Values;

class StringArrayTest extends TypedArrayTest {
	public function getTestArray() {
		return new \Rockschtar\TypedArrays\StringArray();
	}

	public function getErrorValues(): Values {
		$errorValues = new Values();
		$errorValues->add(1);
		$errorValues->add(1.5);
		$errorValues->add(new DummyClass());
		return $errorValues;
	}

	public function testSuccessValue(): void {
		$array = $this->getTestArray();
		$array->append('Test');
		$this->assertInternalType('string', $array->offsetGet(0));
	}
}