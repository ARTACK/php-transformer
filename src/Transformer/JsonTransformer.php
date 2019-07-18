<?php declare(strict_types=1);


namespace PHPTransformer\Transformer;

class JsonTransformer implements TransformerInterface
{

    public function toString($value): string
    {
        return $value;
    }

    public function toInt($value): int
    {
        throw new \Exception('Could not convert json to int');
    }

    public function toFloat($value): float
    {
        throw new \Exception('Could not convert json to float');
    }

    public function toArray($value): array
    {
        return $this->decode($value, true);
    }

    public function toBoolean($value): bool
    {
        throw new \Exception('Could not convert json to boolean');
    }

    public function toObject($value): \stdClass
    {
        return $this->decode($value);
    }

    public function toDate($value): \DateTime
    {
        throw new \Exception('Could not convert json to \DateTime');
    }

    public function isJson($value) :bool
    {
        return (is_string($value) && is_array(json_decode($value, true)) && json_last_error() === JSON_ERROR_NONE);
    }

    private function decode($json, $assoc = false)
    {
        $array = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Could not convert json to array, it seams that your json is invalid');
        }

        return $array;
    }
}