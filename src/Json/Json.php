<?php

namespace Kit\Json;

use Kit\Json\Interfaces\Json as IJson;
use Kit\Json\Exceptions\JsonException;

final class Json implements IJson
{
    public static function encode(array $body): string
    {
        if (empty($body)) {
            throw new JsonException("body can not be empty array!");
        }

        return json_encode($body, JSON_UNESCAPED_UNICODE);
    }

    public static function decode(
        string $body,
        bool $associative = false,
    ): array|object {
        if (!$body) {
            throw new JsonException("body can not be empty string!");
        }

        return json_decode($body, $associative);
    }
}
