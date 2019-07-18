<?php

declare(strict_types=1);

namespace PHPTransformer\Transformer;

use PHPTransformer\Exception\Transformer\ArrayTransformerException;

class ArrayTransformer implements TransformerInterface
{
    public function supports($value): bool
    {
        return \is_array($value);
    }

    public function toString($value): string
    {
        return implode(' ', $value);
    }

    public function toInt($value): int
    {
        return (int) $this->toString($value);
    }

    public function toFloat($value): float
    {
        return (float) $this->toString($value);
    }

    public function toArray($value): array
    {
        return $value;
    }

    public function toBoolean($value): bool
    {
        throw new ArrayTransformerException('ArrayTransformer: Array can not be converted to boolean');
    }

    public function toObject($value): \stdClass
    {
        return (object) $value;
    }

    public function toDate($value): \DateTime
    {
        throw new ArrayTransformerException('ArrayTransformer: Array can not be converted to DateTime');
    }
}
