<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\Array\Arr as Contract;
use Kit\Features\Array\HasValidation;




/**
 * Arr Util
 * @class
 */
class Arr implements Contract {
    /**
     * Import Traits
     */
    use HasValidation;

    
    
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


    /**
     * Add an Element to an Array by Key & Value
     * @method add
     * @static
     * @param array $array
     * @param string $key
     * @param mixed $value
     * @return array
     */
    public static function add(array $array, string $key, mixed $value): array {
        $array[$key] = $value;

        return $array;
    }

    /**
     * Divide an Array to two arrays that provides Keys & Values
     * @method divide
     * @static
     * @param array $array
     * @return array
     */
    public static function divide(array $array): array {
        $keys = array_keys($array);;
        $values = array_values($array);

        return [$keys, $values];
    }

    /**
     * Remove an Element of an array by Key
     * @method except
     * @static
     * @param array $array
     * @param string $key
     * @return array
     */
    public static function except(array $array, string $key): array {
        return array_filter($array, fn($value) => $array[$key] !== $value);
    }

    /**
     * Get first Element value of an array
     * @method first
     * @static
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed {
        return current($array);
    }

    /**
     * Get last Element value of an array
     * @method last
     * @static
     * @param array $array
     * @return mixed
     */
    public static function last(array $array): mixed {
        return end($array);
    }

    /**
     * Get Element of an array by Key
     * @method get
     * @static
     * @param array $array
     * @param string $key
     * @return mixed
     */
    public static function get(array $array, string $key): mixed {
        return $array[$key] ?? null;
    }

    /**
     * Join Elements together by Separator
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
     * Get filtered Elements of an Array by Keys
     * @method only
     * @static
     * @param array $array
     * @param array $keys
     * @return array
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
     * Get Random Element of an array
     * @method random
     * @static
     * @param array $array
     * @return mixed  
     */
    public static function random(array $array): mixed {
        $randomKey = array_rand($array);

        return $array[$randomKey];
    }

    /**
     * Randomize Elements of an array
     * @method shuffle
     * @static
     * @param array $array
     * @return array
     */
    public static function shuffle(array $array): array {
        shuffle($array);
        
        return $array;
    }

    /**
     * Sort an Array by ASC
     * @method sort
     * @static
     * @param array $array
     * @return array
     */
    public static function sort(array $array): array {
        sort($array, SORT_ASC);

        return $array;
    }

    /**
     * Split an Array by Size
     * @method chunk
     * @static
     * @param array $array
     * @param int $size
     * @return array
     */
    public static function chunk(array $array, int $size): array {
        return array_chunk($array, $size);
    }

    /**
     * Remove falsey Elements of an array
     * @method compact
     * @static
     * @param array $array
     * @return array
     */
    public static function compact(array $array): array {
        return array_filter($array, fn($el) => $el == true);
    }

    /**
     * Merge Elements in an array
     * @method contact
     * @static
     * @param array $array
     * @param array $arrays
     * @return array
     */
    public static function contact(array $array, array ...$arrays): array {
        return array_merge_recursive($array, $arrays);
    }

    /**
     * Get not included Elements of an array in another Array
     * @method difference
     * @static
     * @param array $array
     * @param array $with
     * @return array
     */
    public static function difference(array $array, array $with): array {
        return array_diff($array, $with);
    }

    /**
     * Drop Element of an array by Index
     * @method drop
     * @static
     * @param array $array
     * @param int $index
     * @return array
     */
    public static function drop(array $array, int $index = null): array {
        $selfElementIndex = 1;
        
        if (!is_null($index)) return array_splice($array, $index, $selfElementIndex);
        

        array_shift($array);

        return $array;
    }

    /**
     * Fill Elements of an Array by Value
     * @method fill
     * @static
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function fill(array $array, mixed $value): array {
        $minLength = 0;
        $arrayLength = count($array);
        
        return array_fill($minLength, $arrayLength, $value);
    }

    /**
     * Get Element of an array by Index
     * @method nth
     * @static
     * @param array $array
     * @param int $index
     * @return mixed
     */
    public static function nth(array $array, int $index): mixed {
        return $array[$index] ?? null;
    }

    /**
     * Get unique Array
     * @method unique
     * @static
     * @param array $array
     * @return array
     */
    public static function unique(array $array): array {
        return array_unique($array);
    }

    /**
     * Slice an Array by Length
     * @method take
     * @static
     * @param array $array
     * @param int $length
     * @return array
     */
    public static function take(array $array, int $length): array {
        return array_slice($array, 0, $length);
    }

    /**
     * Convert array of CSS styles to string
     * @method toCssStlyes
     * @static
     * @param array $array
     * @return string  
     */
    public static function toCssStyles(array $array): string {
        return implode("; ", $array);
    }
}