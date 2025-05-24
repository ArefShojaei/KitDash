<?php

namespace Kit\Utils;

use Kit\Contracts\Interfaces\Binary as IBinary;


final class Binary implements IBinary {
    private const SEPERATOR_COUNT = 8;

    private const SEPERATOR_VALUE = 0;

    private static string $key;

    private function __construct() {}

    public static function create(string $key): self {
        self::$key = $key;

        return new self;
    }

    private function generateHashKey(string $key): string {
        return strlen(md5($key));
    }

    public function encode(string $content): string {
        $chars = str_split($content);

        $binary_value = "";

        foreach ($chars as $char) {
            $unique_code = ord($char);

            $binary_number = decbin($unique_code + $this->generateHashKey(static::$key));

            $binary_value .= str_pad($binary_number, self::SEPERATOR_COUNT, self::SEPERATOR_VALUE, STR_PAD_LEFT);
        }

        return $binary_value;
    }

    public function decode(string $binary): string {
        $binary_chars = str_split($binary, 8);

        $content = "";

        foreach ($binary_chars as $binary_char) {
            $content .= chr(bindec($binary_char) - $this->generateHashKey(static::$key));
        }

        return $content;
    }
}