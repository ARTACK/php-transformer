<?php

require_once 'vendor/autoload.php';

$transformer = \PHPTransformer\Factory::create();

var_dump($transformer->getStringFromValue(12));