<?php declare(strict_types=1);


namespace PHPTransformer\Transformer;


class StringTransformer implements TransformerInterface
{

    public function toString($value): string
    {
        return $value;
    }

    public function toInt($value): int
    {
        return (int) $value;
    }

    public function toFloat($value): float
    {
        return (float) $value;
    }

    public function toArray($value): array
    {
        return explode(',',$value);
    }

    public function toBoolean($value): bool
    {
        if ($value === '') {
            return false;
        }

        if ($value === 'false') {
            return false;
        }

        return true;
    }

    public function toObject($value): \stdClass
    {
        $object = new \stdClass();
        $object->value = $value;
        return $object;
    }

    public function toDate($value): \DateTime
    {
        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
            throw new \Exception('StringTransformer: Faild to convert '.$value.' to DateTime, with error: '.$e->getMessage());
        }
    }
}