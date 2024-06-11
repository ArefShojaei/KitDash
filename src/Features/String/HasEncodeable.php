<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Encodeable
 * @trait
 */
trait HasEncodeable {
    /**
     * Convert string to Base64 encoding
     * @see https://laravel.com/docs/11.x/strings#method-fluent-str-to-base64
     * @method toBase64
     * @static
     * @param string $subject
     * @return string
     */
    public static function toBase64(string $subject): string {
        return base64_encode($subject);
    }
}