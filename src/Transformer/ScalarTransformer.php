<?php

declare(strict_types=1);

namespace PHPTransformer\Transformer;

use PHPTransformer\Exception\Transformer\ScalarTransformerException;

class ScalarTransformer implements TransformerInterface
{
    public function supports($value): bool
    {
        return !\is_object($value) && (\is_float($value) || \is_int($value));
    }

    public function toString($value): string
    {
        return (string) $value;
    }

    public function toInt($value): int
    {
        return (int) $value;
    }

    public function toFloat($value): float
    {
        if (\is_object($value)) {
            throw new ScalarTransformerException('ScalarTransformer: We cant create a float from a object. Please check the documentation');
        }
    }

    public function toArray($value): array
    {
        return [$value];
    }

    public function toBoolean($value): bool
    {
        return 1.0 === $value || '1.0' === $value || 1 === $value || '1' === $value;
    }

    public function toObject($value): \stdClass
    {
        $object = new \stdClass();
        $object->value = $value;

        return $object;
    }

    public function toDate($value): \DateTime
    {
        throw new ScalarTransformerException('ScalarTransformer: We cant create a DateTime object from a given value');
    }
}
