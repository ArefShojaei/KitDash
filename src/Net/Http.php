<?php

namespace Kit\Net;

abstract class Http
{
    protected static function sendRequest(
        string $method,
        string $url,
        array $body = [],
    ): array|object|null {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        count($body) && curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if (!$response) {
            die(curl_error($curl));
        }

        curl_close($curl);

        return json_decode($response) ?? null;
    }
}
