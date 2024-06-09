<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Case interface for string case types
 * @interface
 */
interface HasCase {
    /**
     * Convert string to Title-case
     * @method title
     * @static
     * @param string $subject
     * @return string
     */
    public static function title(string $subject): string;

    /**
     * Convert Camel-case to Snake-case
     * @method slug
     * @static
     * @param string $subject
     * @param string $separator
     * @return string
     */
    public static function snake(string $subject): string;

    /**
     * Convert Snake-case to Kebab-case
     * @method kebab
     * @static
     * @param string $subject
     * @return string
     */
    public static function kebab(string $subject): string;

    /**
     * Convert Snake-case to Camel-case
     * @method camel
     * @static
     * @param string $subject
     * @return string
     */
    public static function camel(string $subject): string;

    /**
     * Convert Pascal-case to Title-case
     * @method headline
     * @static
     * @param string $subject
     * @return string
     */
    public static function headline(string $subject): string;
}