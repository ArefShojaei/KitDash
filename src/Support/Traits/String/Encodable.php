<?php

namespace Kit\Support\Traits\String;

trait Encodable
{
    /**
     * @see https://laravel.com/docs/11.x/strings#method-fluent-str-to-base64
     */
    public static function toBase64(string $subject): string
    {
        return base64_encode($subject);
    }
}
