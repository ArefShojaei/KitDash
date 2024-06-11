<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\Array\Traits;



/**
 * Has Validation interface
 * @interface
 */
interface HasConcatenation {
    /**
     * Join Elements together by Separator
     * @method join
     * @static
     * @param array $array
     * @param string $separator
     * @return string
     */
    public static function join(array $array, string $separator = ", "): string;

    /**
     * Convert array of CSS styles to string
     * @method toCssStlyes
     * @static
     * @param array $array
     * @return string  
     */
    public static function toCssStyles(array $array): string;

    /**
     * Merge Elements in an array
     * @method conact
     * @static
     * @param array $array
     * @param array $arrays
     * @return array
     */
    public static function conact(array $array, array ...$arrays): array;
}