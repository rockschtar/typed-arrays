<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 19:45
 */

namespace Rockschtar\TypedArrays\Test;

use phpDocumentor\Reflection\Types\Integer;
use PHPUnit\Framework\TestCase;
use Rockschtar\TypedArrays\FloatArray;
use Rockschtar\TypedArrays\IntegerArray;
use Rockschtar\TypedArrays\NumericArray;
use Rockschtar\TypedArrays\PrimitiveTypeArray;
use Rockschtar\TypedArrays\StringArray;
use Rockschtar\TypedArrays\Test\Dummy\DummyClass;
use Rockschtar\TypedArrays\Test\Dummy\DummyTypedArray;


class TypedArrayTest extends TestCase {

    private function getTestValues(): array {

        $testValues = [];
        $testValues[StringArray::class] = ['This is as string'];
        $testValues[Integer::class] = [1];
        $testValues[FloatArray::class] = [1.1];
        $testValues[NumericArray::class] = [1.1, 2];
        $testValues[DummyTypedArray::class] = [new DummyTypedArray()];
        return $testValues;
    }

    /**
     * @covers \Rockschtar\TypedArrays\FloatArray
     * @covers \Rockschtar\TypedArrays\IntegerArray
     * @covers \Rockschtar\TypedArrays\NumericArray
     * @covers \Rockschtar\TypedArrays\StringArray
     * @covers \Rockschtar\TypedArrays\PrimitiveTypeArray
     */
    public function testPrimitiveTypes(): void {

        /* @var PrimitiveTypeArray[] $primitveTypedArrays */
        $primitveTypedArrays = [];

        $primitveTypedArrays[] = new FloatArray();
        $primitveTypedArrays[] = new IntegerArray();
        $primitveTypedArrays[] = new StringArray();
        $primitveTypedArrays[] = new NumericArray();

        foreach ($primitveTypedArrays as $primitveTypedArray) {
            foreach ($this->getTestValues() as $key => $testValues) {

                if ($key === gettype($primitveTypedArray)) {
                    foreach ($testValues as $testValue) {
                        $primitveTypedArray->append($testValue);
                        $this->assertArrayHasKey($testValue, $primitveTypedArray);
                    }
                } else {
                    foreach ($testValues as $testValue) {
                        /** @noinspection DisconnectedForeachInstructionInspection */
                        $this->expectException(\InvalidArgumentException::class);
                        /** @noinspection DisconnectedForeachInstructionInspection */
                        $this->addToAssertionCount(1);
                        $primitveTypedArray->append($testValue);

                    }
                }
            }
        }
    }

    /**
     * @covers \Rockschtar\TypedArrays\TypedArray
     */
    public function testAbstractTypedArray(): void {

        $dummyClass = new DummyClass();
        $testArray = new DummyTypedArray();
        $testArray->append($dummyClass);

        $this->assertCount(1, $testArray);
        $this->assertInstanceOf(DummyClass::class, $testArray->offsetGet(0));

        $this->expectException(\InvalidArgumentException::class);
        $testArray->append('Hello World');

    }
}