<?php

declare(strict_types=1);

namespace PHPTransformer\Transformer;

use PHPTransformer\Exception\Transformer\JsonTransformException;

class JsonTransformer implements TransformerInterface
{
    public function supports($value): bool
    {
        return \is_string($value) && \is_array(json_decode($value, true)) && JSON_ERROR_NONE === json_last_error() && false !== strpos($value, '{');
    }

    public function toString($value): string
    {
        return $value;
    }

    public function toInt($value): int
    {
        throw new JsonTransformException('Could not convert json to int');
    }

    public function toFloat($value): float
    {
        throw new JsonTransformException('Could not convert json to float');
    }

    public function toArray($value): array
    {
        return $this->decode($value, true);
    }

    public function toBoolean($value): bool
    {
        throw new JsonTransformException('Could not convert json to boolean');
    }

    public function toObject($value): \stdClass
    {
        return $this->decode($value);
    }

    public function toDate($value): \DateTime
    {
        throw new JsonTransformException('Could not convert json to \DateTime');
    }

    private function decode($json, $assoc = false)
    {
        $array = json_decode($json, $assoc);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonTransformException('Could not convert json to array, it seams that your json is invalid');
        }

        return $array;
    }
}
