# PHP Transformer

[![Build Status](https://travis-ci.org/flaver12/php-transformer.svg?branch=master)](https://travis-ci.org/flaver12/php-transformer)
[![GitHub license](https://img.shields.io/github/license/flaver12/php-transformer.svg)](https://github.com/flaver12/php-transformer)
[![GitHub issues](https://img.shields.io/github/issues/flaver12/php-transformer.svg)](https://github.com/flaver12/php-transformer/issues)
[![GitHub license](https://img.shields.io/github/license/flaver12/php-transformer.svg)](https://github.com/flaver12/php-transformer)

This package allows you to transform data from from a api to a format that you need.

## Install
```bash
$ composer install flaver/php-transformer 
```

Then add the composer autoload file to your application.
And you are good to go

## Usage
```php
<?php

include 'vendor/autoload.php';

$data = new MyApiService()->getData();

$transfomer = \PHPTransformer\Factory::create();
$orders = $transfomer->getArrayFromValue($data['orders']);
```

## Mappings

***Important*** When you are transforming to a object your given value is found in the value property of the object.
This does not count for array's, there are the keys mapped as property names.
 
string => int, float, array, boolean, object, date   
int => string, float, array, boolean, object   
float => string, int, array, boolean, object   
array => string, int, float, object   
boolean => string, int, float, array, object    
json => string, array, object 

## Function
```php
<?php
$transformer = \PHPTransformer\Factory::create();

// Output: ['Lorem', 'Ipsum']
$transformer->getArrayFromValue("Lorem Ipsum");

// Output: stdClass: { test => "test" }
$transformer->getObjectFromValue('{"test": test}');

// Output: 1.0
$transformer->getFloatFromValue(1);

// Output: 1
$transformer->getIntFromValue("1");

// Output: "1 asd 2"
$transformer->getStringFromValue([1, 'asd', 2]);

// Output: true
$transformer->getBooleanFromValue('true');

// Output: DateTime object
$transformer->getDateTimeFromValue('now');
```