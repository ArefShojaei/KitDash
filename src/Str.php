<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Str as Contract;
use Kit\Features\String\{
    HasValidation,
    HasDecoration,
    HasCase,
    HasCountable,
    HasEncodeable,
    HasEscapeable,
    HasModifiable,
    HasSearch
};



/**
 * String Util
 * @class
 * @implements StrContract
 */
class Str implements Contract {
    /**
     * Import Traits
     */
    use HasValidation, HasDecoration, HasCase,
        HasEscapeable, HasSearch, HasEncodeable,
        HasModifiable, HasCountable;



    /**
     * Constructor
     * @private
     */
    private function __construct() {}


    /**
     * Get string after a Word or Sentence
     * @method after
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function after(string $subject, string $search): string {
        return strstr($subject, $search);
    }

    /**
     * Get string before a Word or Sentence
     * @method before
     * @static
     * @param string $subject
     * @param string $search
     * @return string
     */
    public static function before(string $subject, string $search): string {
        $parsedString = explode($search, $subject);

        return current($parsedString);
    }

    /**
     * Get Class name in a namespace as string
     * @method classBaseName
     * @static
     * @param string $namespace
     * @return string
     */
    public static function classBaseName(string $namespace): string {
        $parsedString = explode("\\", $namespace);

        return end($parsedString);
    }

    /**
     * Get center content in a string by between sentences
     * @method between
     * @static
     * @param string $subject
     * @param string $from
     * @param string $to
     * @return string
     */
    public static function between(string $subject, string $from, string $to): string {
        return str_replace([$from, $to], [null, null], $subject);
    }

    /**
     * Split content of a string by Separator
     * @method split
     * @static
     * @param string $subject
     * @param string $separator
     * @return array
     */
    public static function split(string $subject, string $separator): array {
        return explode($separator, $subject);
    }

    /**
     * Slice content of a string by Offset & Length
     * @method substr
     * @static
     * @param string $subject
     * @param int $offset
     * @param int $length
     * @return string
     */
    public static function substr(string $subject, int $offset, int $length): string {
        return substr($subject, $offset, $length);
    }
}