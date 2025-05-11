<?php

namespace Kit\Utils\Providers\Array;


trait HasCRUD {
    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-add
     */
    public static function add(array $array, string $key, mixed $value): array {
        $array[$key] = $value;

        return $array;
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-get
     */
    public static function get(array $array, string $key): mixed {
        return $array[$key] ?? null;
    }

    /**
     * Slice an array by length
     * @see https://laravel.com/docs/11.x/helpers#method-array-take
     */
    public static function take(array $array, int $length): array {
        return array_slice($array, 0, $length);
    }

    /**
     * Get element of an array by index
     * @see https://lodash.info/doc/nth
     */
    public static function nth(array $array, int $index): mixed {
        return $array[$index] ?? null;
    }

    /**
     * @see https://lodash.info/doc/drop
     */
    public static function drop(array $array, int $index = null): array {
        $selfElementIndex = 1;

        if (!is_null($index)) return array_splice($array, $index, $selfElementIndex);

        array_shift($array);

        return $array;
    }

    /**
     * Remove falsey elements of an array
     * @see https://lodash.info/doc/compact
     */
    public static function compact(array $array): array {
        return array_filter($array, fn ($el) => $el == true);
    }

    /**
     * Remove an element of an array by key
     * @see https://laravel.com/docs/11.x/helpers#method-array-except
     */
    public static function except(array $array, string $key): array {
        return array_filter($array, fn ($value) => $array[$key] !== $value);
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-first
     */
    public static function first(array $array): mixed {
        return current($array);
    }

    /**
     * @see https://laravel.com/docs/11.x/helpers#method-array-last
     */
    public static function last(array $array): mixed {
        return end($array);
    }

    /**
     * Get filtered elements of an array by keys
     * @see https://laravel.com/docs/11.x/helpers#method-array-only
     */
    public static function only(array $array, array $keys): array {
        $result = [];

        foreach ($keys as $key) {
            $value = $array[$key];

            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * @see https://lodash.info/doc/fill
     */
    public static function fill(array $array, mixed $value): array {
        $minLength = 0;
        $arrayLength = count($array);

        return array_fill($minLength, $arrayLength, $value);
    }
}