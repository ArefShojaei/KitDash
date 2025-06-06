<?php

namespace Kit\Utils;


abstract class Http {
    protected static function sendRequest(string $method, string $url, array $body = []): array|object|null {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        count($body) && curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if (!$response) die(curl_error($curl));

        curl_close($curl);

        return json_decode($response) ?? null;
    }
}

/**
 * @method static array|object|null get(string $url)
 * @method static array|object|null post(string $url, array $body)
 * @method static array|object|null put(string $url, array $body)
 * @method static array|object|null patch(string $url, array $body)
 * @method static array|object|null delete(string $url, array $body)
 */
final class Request extends Http {
    public const READABLE = "GET";

    public const CREATABLE  = "POST";

    public const UPDATEABLE = "PUT";

    public const EDITABLE = "PATCH";

    public const DELETABLE  = "DELETE";

    private static array $allowedMethods = [
        self::READABLE, self::CREATABLE,
        self::UPDATEABLE, self::EDITABLE,
        self::DELETABLE
    ];


    public static function __callStatic(string $method, array $params) {
        $verb = strtoupper($method);

        $isAllowedMethod = in_array($verb, self::$allowedMethods);

        if (!$isAllowedMethod) die("The \"{$verb}\" verb is not valid method!");

        return parent::sendRequest($verb, array_shift($params), $params);
    }
}