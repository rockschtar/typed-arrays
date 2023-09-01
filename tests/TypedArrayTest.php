<?php

namespace Rockschtar\TypedArrays\Test;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Rockschtar\TypedArrays\FloatArray;
use Rockschtar\TypedArrays\IntegerArray;
use Rockschtar\TypedArrays\NumericArray;
use Rockschtar\TypedArrays\PrimitiveTypeArray;
use Rockschtar\TypedArrays\StringArray;
use Rockschtar\TypedArrays\Test\Dummy\DummyClass;
use Rockschtar\TypedArrays\Test\Dummy\DummyTypedArray;

/**
 * Class TypedArrayTest
 * @package Rockschtar\TypedArrays\Test
 */
class TypedArrayTest extends TestCase
{
    private function getTestValues(): array
    {

        $testValues = [];
        $testValues[StringArray::class] = ['This is as string'];
        $testValues[IntegerArray::class] = [1];
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
     * @covers \Rockschtar\TypedArrays\FloatArray::validate
     * @covers \Rockschtar\TypedArrays\IntegerArray::validate
     * @covers \Rockschtar\TypedArrays\NumericArray::validate
     * @covers \Rockschtar\TypedArrays\StringArray::validate
     * @covers \Rockschtar\TypedArrays\PrimitiveTypeArray
     */
    public function testPrimitiveTypes(): void
    {

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
                        $this->expectException(InvalidArgumentException::class);
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
    public function testAbstractTypedArray(): void
    {

        $dummyClass = new DummyClass();
        $testArray = new DummyTypedArray();
        $testArray->append($dummyClass);

        $this->assertCount(1, $testArray);
        $this->assertInstanceOf(DummyClass::class, $testArray->offsetGet(0));

        $this->expectException(InvalidArgumentException::class);
        $testArray->append('Hello World');
    }
}
