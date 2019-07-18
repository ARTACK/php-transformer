<?php declare(strict_types=1);


namespace PHPTransformer\Transformer;


class ScalarTransformer implements TransformerInterface
{

    public function toString($value): string
    {
        if (is_object($value)) {
            throw new \Exception('ScalarTransformer: We cant create a string from a object. Please check the documentation');
        }
        return (string)$value;
    }

    public function toInt($value): int
    {
        if (is_object($value)) {
            throw new \Exception('ScalarTransformer: We cant create a int from a object. Please check the documentation');
        }
        return (int)$value;
    }

    public function toFloat($value): float
    {
        if (is_object($value)) {
            throw new \Exception('ScalarTransformer: We cant create a float from a object. Please check the documentation');
        }
    }

    public function toArray($value): array
    {
        return [$value];
    }

    public function toBoolean($value): bool
    {
        return $value === 1.0 || $value === '1.0' || $value === 1 || $value === '1';
    }

    public function toObject($value): \stdClass
    {
        $object = new \stdClass();
        $object->value = $value;
        return $object;
    }

    public function toDate($value): \DateTime
    {
        throw new \Exception('ScalarTransformer: We cant create a DateTime object from a given value');
    }
}