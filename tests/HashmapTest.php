<?php


namespace Rockschtar\TypedArrays\Test;


use PHPUnit\Framework\TestCase;
use Rockschtar\TypedArrays\Hashmap;
use Rockschtar\TypedArrays\Models\KeyValuePair;

class HashmapTest extends TestCase {

    public function testHashmap(): void {

        $hashmap = new Hashmap();

        $hashmap->add('key1', 'value1');

        $keyValuePair1 = $hashmap->offsetGet(0);

        $this->assertInstanceOf(KeyValuePair::class, $keyValuePair1);
        $this->assertEquals('key1', $keyValuePair1->getKey());
        $this->assertEquals('value1', $keyValuePair1->getValue());

        $hashmap->append(new KeyValuePair('key2', 'value2'));

        $keyValuePair2 = $hashmap->offsetGet(1);

        $this->assertInstanceOf(KeyValuePair::class, $keyValuePair2);
        $this->assertEquals('key2', $keyValuePair2->getKey());
        $this->assertEquals('value2', $keyValuePair2->getValue());

        $this->expectException(\InvalidArgumentException::class);
        $hashmap->append('hello');

    }

}