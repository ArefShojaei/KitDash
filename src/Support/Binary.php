<?php

namespace Kit\Support;

use Kit\Support\Interfaces\Bin as IBinary;

final class Binary implements IBinary
{
    private const SEPERATOR_COUNT = 8;

    private const SEPERATOR_VALUE = "0";

    private const HASH_RANGE = 128;

    private function __construct(private string $key) {}

    public static function create(string $key): self
    {
        return new self($key);
    }

    private function generateHashKey(string $key): int
    {
        $hash = crc32($key);
        $positive = abs($hash);
        $offset = $positive % self::HASH_RANGE;

        return $offset;
    }

    public function encode(string $content): string
    {
        $chars = str_split($content);

        $binary_value = "";

        $hashKey = $this->generateHashKey($this->key);

        foreach ($chars as $char) {
            $unique_code = ord($char);

            $binary_number = decbin($unique_code + $hashKey);

            $binary_value .= str_pad(
                $binary_number,
                self::SEPERATOR_COUNT,
                self::SEPERATOR_VALUE,
                STR_PAD_LEFT,
            );
        }

        return $binary_value;
    }

    public function decode(string $binary): string
    {
        $binary_chars = str_split($binary, self::SEPERATOR_COUNT);

        $content = "";

        $hashKey = $this->generateHashKey($this->key);

        foreach ($binary_chars as $binary_char) {
            $content .= chr(bindec($binary_char) - $hashKey);
        }

        return $content;
    }
}
