<?php


class TransformerBooleanTest extends \PHPUnit\Framework\TestCase
{

    public function testBooleanFromJson()
    {
        $transformer = \PHPTransformer\Factory::create();
        $json = json_encode(['a' => 'b']);
        $this->expectException(Exception::class);
        $transformer->getBooleanFromValue($json);
    }

    public function testBooleanFromInt()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getBooleanFromValue(1);
        $this->assertTrue($result);
    }

    public function testBooleanFromBoolean()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getBooleanFromValue(true);
        $this->assertTrue($result);
    }

    public function testBooleanFromString()
    {
        $transformer = \PHPTransformer\Factory::create();
        $result = $transformer->getBooleanFromValue('true');
        $this->assertTrue($result);
    }

    public function testBooleanFromArray()
    {
        $transformer = \PHPTransformer\Factory::create();
        $this->expectException(Exception::class);
        $transformer->getBooleanFromValue(['a' => 'b']);
    }

}