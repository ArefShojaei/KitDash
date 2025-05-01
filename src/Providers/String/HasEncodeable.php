<?php

namespace Kit\Providers\String;


trait HasEncodeable {
    /**
     * Convert string to Base64 encoding
     * @see https://laravel.com/docs/11.x/strings#method-fluent-str-to-base64
     */
    public static function toBase64(string $subject): string {
        return base64_encode($subject);
    }
}