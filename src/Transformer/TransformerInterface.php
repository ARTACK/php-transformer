<?php

declare(strict_types=1);

namespace PHPTransformer\Transformer;

interface TransformerInterface
{
    public function supports($value): bool;

    public function toString($value): string;

    public function toInt($value): int;

    public function toFloat($value): float;

    public function toArray($value): array;

    public function toBoolean($value): bool;

    public function toObject($value): \stdClass;

    public function toDate($value): \DateTime;
}
