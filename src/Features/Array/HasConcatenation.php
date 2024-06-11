<?php

/**
 * @namespace
 */
namespace Kit\Features\Array;



/**
 * Has Concatenation
 * @trait
 */
trait HasConcatenation {
    /**
     * Join Elements together by Separator
     * @see https://laravel.com/docs/11.x/helpers#method-array-join
     * @method join
     * @static
     * @param array $array
     * @param string $separator
     * @return string
     */
    public static function join(array $array, string $separator = ", "): string {
        return implode($separator, $array);
    }

    /**
     * Convert array of CSS styles to string
     * @see https://laravel.com/docs/11.x/helpers#method-array-to-css-styles
     * @method toCssStlyes
     * @static
     * @param array $array
     * @return string  
     */
    public static function toCssStyles(array $array): string {
        return implode("; ", $array);
    }

    /**
     * Merge Elements in an array
     * @see https://lodash.info/doc/concat
     * @method contact
     * @static
     * @param array $array
     * @param array $arrays
     * @return array
     */
    public static function contact(array $array, array ...$arrays): array {
        return array_merge_recursive($array, $arrays);
    }
}