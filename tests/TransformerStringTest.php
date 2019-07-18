<?php


class TransformerStringTest extends \PHPUnit\Framework\TestCase
{
    public function testStringFromJson()
    {
        $transformer = \PHPTransformer\Factory::create();
        $json = json_encode(['a' => 'b']);
        $result = $transformer->getStringFromValue($json);
        $this->assertSame($json, $result);
    }
    public function testStringFromInt()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getStringFromValue(12);
        $this->assertSame('12', $result);
    }

    public function testStringFromString()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getStringFromValue('12');
        $this->assertSame('12', $result);
    }

    public function testStringFromBool()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getStringFromValue(true);
        $this->assertSame('true', $result);
    }

    public function testStringFromArray()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getStringFromValue([12,true,'asdf']);
        $this->assertSame('12 1 asdf', $result);
    }
}