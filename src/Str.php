<?php

/**
 * @namespace
 */
namespace Kit;


/**
 * @package
 */
use Kit\Contracts\Interfaces\String\Str as StrContract;



/**
 * String Util
 * @class
 * @implements StrContract
 */
class Str implements StrContract {
    /**
     * Constructor
     * @private
     */
    private function __construct() {}


    /**
     * Convert special characters
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string {
        return htmlspecialchars($subject);
    }

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
     * Convert string to Upper case
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function upper(string $subject): string {
        return strtoupper($subject);
    }

    /**
     * Convert string to Lower case
     * @method upper
     * @static
     * @param string $subject
     * @return string
     */
    public static function lower(string $subject): string {
        return strtolower($subject);
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
     * Get word of string by Index
     * @method charAt
     * @static
     * @param string $subject
     * @param int $index
     * @return string
     */
    public static function charAt(string $subject, int $index): string {
        return $subject[$index] ?? 0;
    }

    /**
     * Check to exist a Word in a string
     * @method contains
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function contains(string $subject, string $search): bool {
        return str_contains($subject, $search);
    }

    /**
     * Check to exist all Words in a string 
     * @method containsAll
     * @static
     * @param string $subject
     * @param array $search
     * @return bool
     */
    public static function containsAll(string $subject, array $search): bool {
        $state = false;

        # Iterate on $search as Array of Words
        foreach ($search as $word) {
            $status = str_contains($subject, $word);

            # Not exists
            if (!$status) {
                $state = false;
                break;
            }

            # Is exists
            $state = $status;
        }

        return $state;
    }

    /**
     * Check a string that ends with a Word
     * @method endsWith
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function endsWith(string $subject, string $search): bool {
        return str_ends_with($subject, $search);
    }

    /**
     * Check a string that starts with a Word
     * @method startsWith
     * @static
     * @param string $subject
     * @param string $search
     * @return bool
     */
    public static function startsWith(string $subject, string $search): bool {
        return str_starts_with($subject, $search);
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

    /**
     * Check to valid JSON type
     * @method isJSON
     * @static
     * @param string $json
     * @return bool
     */
    public static function isJSON(string $json): bool {
        return (bool) json_decode($json, true);
    }

    /**
     * Check to valid URL
     * @method isURL
     * @static
     * @param string $url
     * @return bool
     */
    public static function isURL(string $url): bool {
        $parsedURL = parse_url($url);

        if (!isset($parsedURL["scheme"])) return false;

        return true;
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
     * Get string length
     * @method length
     * @static
     * @param string $subject
     * @return int
     */
    public static function length(string $subject): int {
        return strlen($subject);
    }
}