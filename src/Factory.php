<?php

declare(strict_types=1);

namespace PHPTransformer;

use PHPTransformer\Transformer\ArrayTransformer;
use PHPTransformer\Transformer\BooleanTransformer;
use PHPTransformer\Transformer\JsonTransformer;
use PHPTransformer\Transformer\ScalarTransformer;
use PHPTransformer\Transformer\StringTransformer;

class Factory
{
    private static $instance;

    public static function create(): Transformer
    {
        $allTransformers = [
            new ArrayTransformer(),
            new BooleanTransformer(),
            new JsonTransformer(),
            new ScalarTransformer(),
            new StringTransformer(),
        ];

        self::$instance = new Transformer($allTransformers);

        return self::$instance;
    }

    public static function getInstance(): Transformer
    {
        if (self::$instance) {
            return self::$instance;
        }

        return self::create();
    }
}
