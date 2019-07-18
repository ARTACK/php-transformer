<?php declare(strict_types=1);


namespace PHPTransformer;

use PHPTransformer\Transformer\ArrayTransformer;
use PHPTransformer\Transformer\BooleanTransformer;
use PHPTransformer\Transformer\JsonTransformer;
use PHPTransformer\Transformer\ScalarTransformer;
use PHPTransformer\Transformer\StringTransformer;

/**
 * @property StringTransformer $stringTransformer
 * @property JsonTransformer $jsonTransformer
 * @property BooleanTransformer $booleanTransformer
 * @property ScalarTransformer $scalarTransformer
 * @property ArrayTransformer $arrayTransformer
 */
class Transformer
{

    private const TYPE_ARRAY = 'toArray';
    private const TYPE_STRING = 'toString';
    private const TYPE_BOOLEAN = 'toBoolean';
    private const TYPE_FLOAT = 'toFloat';
    private const TYPE_INT = 'toInt';
    private const TYPE_DATE = 'toDate';
    private const TYPE_OBJECT = 'toObject';

    public function __construct(array $allTransformers)
    {
        foreach ($allTransformers as $transformer) {
            $this->{$transformer['property']} = $transformer['object'];
        }
    }

    public function getStringFromValue($value) :string
    {
        return $this->getValueForm(self::TYPE_STRING, $value);
    }

    public function getBooleanFromValue($value) :bool
    {
        return $this->getValueForm(self::TYPE_BOOLEAN, $value);
    }

    public function getIntFromValue($value) :int
    {
        return $this->getValueForm(self::TYPE_INT, $value);
    }

    public function getFloatFromValue($value) :float
    {
        return $this->getValueForm(self::TYPE_FLOAT, $value);
    }

    public function getArrayFromValue($value) :array
    {
        return $this->getValueForm(self::TYPE_ARRAY, $value);
    }

    public function getObjectFromValue($value) :\stdClass
    {
        return $this->getValueForm(self::TYPE_OBJECT, $value);
    }

    public function getDateTimeFromValue($value) :\DateTime
    {
        return $this->getValueForm(self::TYPE_DATE, $value);
    }

    protected function getValueForm($type, $value)
    {
        switch ($value) {
            case $this->jsonTransformer->isJson($value):
                return $this->jsonTransformer->{$type}($value);
                break;
            case \is_string($value):
                return $this->stringTransformer->{$type}($value);
                break;
            case \is_bool($value):
                return $this->booleanTransformer->{$type}($value);
                break;
            case \is_scalar($value):
                return $this->scalarTransformer->{$type}($value);
                break;
            case \is_array($value):
                return $this->arrayTransformer->{$type}($value);
            default:
                throw new \Exception('We could not determine the type of the given value');
        }
    }
}