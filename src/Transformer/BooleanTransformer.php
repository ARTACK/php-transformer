<?php declare(strict_types=1);


namespace PHPTransformer\Transformer;


class BooleanTransformer implements TransformerInterface
{

    public function toString($value): string
    {
        return $value ? 'true': 'false';
    }

    public function toInt($value): int
    {
        return $value ? 1: 0;
    }

    public function toFloat($value): float
    {
        return $value ? 1.0: 0.0;
    }

    public function toArray($value): array
    {
        return [$value];
    }

    public function toBoolean($value): bool
    {
        return $value;
    }

    public function toObject($value): \stdClass
    {
        $object = new \stdClass();
        $object->value = $value;
        return $value;
    }

    public function toDate($value): \DateTime
    {
        throw new \Exception('BooleanTransformer: Can not convert a bool to a date');
    }
}