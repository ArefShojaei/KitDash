<?php

namespace Kit\Net;

use Kit\Net\Exceptions\RequestException;

abstract class Http
{
    protected static function sendRequest(
        string $method,
        string $url,
        array $body = [],
        array $headers = [],
    ): mixed {
        $curl = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => strtoupper($method),
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $headers,
        ];

        if (!empty($body)) {
            $json = json_encode(
                $body,
                JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR,
            );

            $options[CURLOPT_POSTFIELDS] = $json;
        }

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $errorNo = curl_errno($curl);

        curl_close($curl);

        if (!$response) {
            throw new RequestException("cURL Error #{$errorNo}: {$error}");
        }

        return $response;
    }
}
