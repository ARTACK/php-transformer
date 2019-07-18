<?php


class FactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testInstanceCreation()
    {
        $factoryInstance = \PHPTransformer\Factory::create();
        $this->assertSame($factoryInstance, \PHPTransformer\Factory::getInstance());
    }
}