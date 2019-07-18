<?php


class TransformerArrayTest extends \PHPUnit\Framework\TestCase
{

    public function testStringFromArray()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getStringFromValue(['a','s']);
        $this->assertSame('a s', $result);
    }

    public function testIntFromArray()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getIntFromValue([1]);
        $this->assertSame(1, $result);
    }

    public function testFloatFromArray()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getFloatFromValue([1.2]);
        $this->assertSame(1.2, $result);
    }

    public function testObjectFromArray()
    {
        $object = new stdClass();
        $transformer = \PHPTransformer\Factory::create();
        $object->a = 1;
        $result = $transformer->getObjectFromValue(['a' => 1]);
        $this->assertEquals($object, $result);
    }

}