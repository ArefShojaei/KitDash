<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Traits\{
    HasCountable,
    HasValidation,
    HasDecoration,
    HasEncodeable,
    HasEscapeable,
    HasModifiable,
    HasSearch
};


/**
 * String interface
 * @interface
 */
interface Str extends HasValidation, HasDecoration, HasEscapeable, HasSearch, HasEncodeable, HasModifiable, HasCountable {
    /**
     * Get Class name in a namespace as string
     * @method classBaseName
     * @static
     * @param string $namespace
     * @return string
     */
    public static function classBaseName(string $namespace): string;

    /**
     * Split content of a string by Separator
     * @method split
     * @static
     * @param string $subject
     * @param string $separator
     * @return array
     */
    public static function split(string $subject, string $separator): array;

    /**
     * Slice content of a string by Offset & Length
     * @method substr
     * @static
     * @param string $subject
     * @param int $offset
     * @param int $length
     * @return string
     */
    public static function substr(string $subject, int $offset, int $length): string;
}