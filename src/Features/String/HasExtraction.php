<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Extraction
 * @trait
 */
trait HasExtraction {
    /**
     * Split content of a string by Separator
     * @see https://lodash.info/doc/split
     * @method split
     * @static
     * @param string $subject
     * @param string $separator
     * @return array
     */
    public static function split(string $subject, string $separator): array {
        return explode($separator, $subject);
    }
}