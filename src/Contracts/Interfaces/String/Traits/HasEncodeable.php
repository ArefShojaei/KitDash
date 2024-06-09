<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Encodeable interface
 * @interface
 */
interface HasEncodeable {
    /**
     * Convert string to Base64 encoding
     * @method toBase64
     * @static
     * @param string $subject
     * @return string
     */
    public static function toBase64(string $subject): string;
}