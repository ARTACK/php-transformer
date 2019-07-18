<?php declare(strict_types=1);

namespace PHPTransformer;

use Symfony\Component\Yaml\Yaml;

class Factory
{
    private static $instance;

    public static function create() :Transformer
    {
        $content = Yaml::parseFile(realpath('.').'/config/transformer.yml');
        $allTransformers = [];

        foreach ($content['transformers'] as $transformer) {
            $allTransformers[] = [
              'property' => $transformer['property'],
              'object'  => new $transformer['class'],
            ];
        }

        self::$instance = new Transformer($allTransformers);
        return self::$instance;
    }

    public static function getInstance() :Transformer
    {
        if (self::$instance) {
            return self::$instance;
        }

        return self::create();
    }
}