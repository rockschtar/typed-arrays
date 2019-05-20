<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 19:45
 */

namespace Rockschtar\TypedArrays\Test;

use Rockschtar\TypedArrays\Test\Dummy\DummyClass;
use Rockschtar\TypedArrays\Test\Dummy\DummyTypedArray;
use Rockschtar\TypedArrays\Test\Models\Values;

class DummyTypedArrayTest extends TypedArrayTest {

	public function getTestArray(): DummyTypedArray {
		return new DummyTypedArray();
	}

	public function getErrorValues(): Values {

		$testClass = new class {};
		$errorValues = new Values();
		$errorValues->add(1);
		$errorValues->add(1.5);
		$errorValues->add('1dfklfkl');
		$errorValues->add(new $testClass);
		return $errorValues;
	}

	public function testSuccessValue(): void {

		$dummyClass = new DummyClass();
		$testArray = $this->getTestArray();
		$testArray->append($dummyClass);

		$this->assertCount(1, $testArray);
		$this->assertInstanceOf(DummyClass::class, $testArray->offsetGet(0));

	}
}