<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Validation
 * @trait
 */
trait HasValidation {
    /**
     * Check to valid JSON type
     * @method isJSON
     * @static
     * @param string $json
     * @return bool
     */
    public static function isJSON(string $json): bool {
        return (bool) json_decode($json, true);
    }

    /**
     * Check to valid URL
     * @method isURL
     * @static
     * @param string $url
     * @return bool
     */
    public static function isURL(string $url): bool {
        $parsedURL = parse_url($url);

        if (!isset($parsedURL["scheme"])) return false;

        return true;
    }

    /**
     * Check to empty a string
     * @method isEmpty
     * @static
     * @param string $subject
     * @return bool
     */
    public static function isEmpty(string $subject): bool {
        return empty($subject);
    }
}