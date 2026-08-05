<?php

namespace Kit\Net;

use Kit\Net\Exceptions\InvalidRequestMethodException;

/**
 * @method static mixed get(string $url, array $body = [], array $headers = [])
 * @method static mixed post(string $url, array $body, array $headers = [])
 * @method static mixed put(string $url, array $body, array $headers = [])
 * @method static mixed patch(string $url, array $body, array $headers = [])
 * @method static mixed delete(string $url, array $body, array $headers = [])
 */
final class Request extends Http
{
    public const READABLE = "GET";

    public const CREATABLE = "POST";

    public const UPDATEABLE = "PUT";

    public const EDITABLE = "PATCH";

    public const DELETABLE = "DELETE";

    private static array $allowedMethods = [
        self::READABLE,
        self::CREATABLE,
        self::UPDATEABLE,
        self::EDITABLE,
        self::DELETABLE,
    ];

    public static function __callStatic(string $method, array $params)
    {
        $verb = strtoupper($method);

        $isAllowedMethod = in_array($verb, self::$allowedMethods);

        if (!$isAllowedMethod) {
            throw new InvalidRequestMethodException(
                "{$verb} method is not supported!",
            );
        }

        return parent::sendRequest($verb, array_shift($params), $params);
    }
}
