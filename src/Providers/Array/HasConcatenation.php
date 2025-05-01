<?php

namespace Kit\Providers\Array;


trait HasConcatenation {
    /**
     * Join Elements together by Separator
     * @see https://laravel.com/docs/11.x/helpers#method-array-join
     */
    public static function join(array $array, string $separator = ", "): string {
        return implode($separator, $array);
    }

    /**
     * Convert array of CSS styles to string
     * @see https://laravel.com/docs/11.x/helpers#method-array-to-css-styles
     */
    public static function toCssStyles(array $array): string {
        return implode("; ", $array);
    }

    /**
     * Merge Elements in an array
     * @see https://lodash.info/doc/concat
     */
    public static function conact(array $array, array ...$arrays): array {
        return array_merge_recursive($array, $arrays);
    }
}