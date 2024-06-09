<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Case for string case types
 * @trait
 */
trait HasCase {
    /**
     * Convert string to Title-case
     * @method title
     * @static
     * @param string $subject
     * @return string
     */
    public static function title(string $subject): string {
        $content = preg_replace_callback("/(?<character>^[a-z]|\s[a-z])/", function ($matches) {
            return strtoupper($matches['character']);
        }, $subject);

        return trim($content);
    }

    /**
     * Convert Camel-case to Snake-case
     * @method slug
     * @static
     * @param string $subject
     * @param string $separator
     * @return string
     */
    public static function snake(string $subject): string {
        $content = preg_replace_callback("/(?<separator>[A-Z])/", function ($matches) {
            return "_" . $matches["separator"];
        }, $subject);

        return trim($content, "-");
    }

    /**
     * Convert Snake-case to Kebab-case
     * @method kebab
     * @static
     * @param string $subject
     * @return string
     */
    public static function kebab(string $subject): string {
        $content = preg_replace_callback("/(?<separator>[A-Z])/", function ($matches) {
            return "-" . $matches["separator"];
        }, $subject);

        return trim($content, "-");
    }

    /**
     * Convert Snake-case to Camel-case
     * @method camel
     * @static
     * @param string $subject
     * @return string
     */
    public static function camel(string $subject): string {
        [$firstWord, $lastWord] = explode("_", $subject);

        return $firstWord .  ucfirst($lastWord);
    }

    /**
     * Convert Pascal-case to Title-case
     * @method headline
     * @static
     * @param string $subject
     * @return string
     */
    public static function headline(string $subject): string {
        $content = preg_replace_callback("/(?<separator>[A-Z_])/", function ($matches) {
            return " " . $matches["separator"];
        }, $subject);

        return trim($content);
    }
}