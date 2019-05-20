<?php

namespace Rockschtar\TypedArrays\Test;

use Rockschtar\TypedArrays\StringArray;
use Rockschtar\TypedArrays\Test\Models\Values;
use Rockschtar\TypedArrays\TypedArray;

abstract class TypedArrayTest extends \PHPUnit\Framework\TestCase {
	abstract public function getTestArray();

	abstract public function getErrorValues() : Values;

	abstract public function testSuccessValue() : void;

	private function appendErrorValue(int $index): void {

		if(isset($this->getErrorValues()->get()[$index])) {
			$this->getTestArray()->append($this->getErrorValues()->get()[$index]);
		}

	}

	public function testTypedArray1() : void {
		$this->expectException(\InvalidArgumentException::class);
		$this->appendErrorValue(0);
	}


	public function testTypedArray2() : void {
		$this->expectException(\InvalidArgumentException::class);
		$this->appendErrorValue(1);
	}

	public function testTypedArray3() : void {
		$this->expectException(\InvalidArgumentException::class);
		$this->appendErrorValue(2);
	}

	public function testTypedArray4() : void {
		$this->expectException(\InvalidArgumentException::class);
		$this->appendErrorValue(3);
	}



}
