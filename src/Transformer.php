<?php

declare(strict_types=1);

namespace PHPTransformer;

use PHPTransformer\Exception\TransformerException;
use PHPTransformer\Transformer\TransformerInterface;

class Transformer
{
    public const TYPE_ARRAY = 'toArray';
    public const TYPE_STRING = 'toString';
    public const TYPE_BOOLEAN = 'toBoolean';
    public const TYPE_FLOAT = 'toFloat';
    public const TYPE_INT = 'toInt';
    public const TYPE_DATE = 'toDate';
    public const TYPE_OBJECT = 'toObject';

    /** @var array | TransformerInterface[] */
    private $allTransformers;

    public function __construct(array $allTransformers)
    {
        $this->allTransformers = $allTransformers;
    }

    public function getStringFromValue($value): string
    {
        return $this->getValueForm(self::TYPE_STRING, $value);
    }

    public function getBooleanFromValue($value): bool
    {
        return $this->getValueForm(self::TYPE_BOOLEAN, $value);
    }

    public function getIntFromValue($value): int
    {
        return $this->getValueForm(self::TYPE_INT, $value);
    }

    public function getFloatFromValue($value): float
    {
        return $this->getValueForm(self::TYPE_FLOAT, $value);
    }

    public function getArrayFromValue($value): array
    {
        return $this->getValueForm(self::TYPE_ARRAY, $value);
    }

    public function getObjectFromValue($value): \stdClass
    {
        return $this->getValueForm(self::TYPE_OBJECT, $value);
    }

    public function getDateTimeFromValue($value): \DateTime
    {
        return $this->getValueForm(self::TYPE_DATE, $value);
    }

    protected function getValueForm($type, $value)
    {
        foreach ($this->allTransformers as $transformer) {
            if ($transformer->supports($value)) {
                return $transformer->{$type}($value);
            }
        }

        throw new TransformerException('No transformer supports the type '.\gettype($value));
    }
}
