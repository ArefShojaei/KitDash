<?php

namespace Kit\Providers\String;


trait HasSearchable {
    /**
     * Get word of string by Index
     * @see https://laravel.com/docs/11.x/strings#method-char-at
     */
    public static function charAt(string $subject, int $index): string {
        return $subject[$index] ?? 0;
    }

    /**
     * Get position of a Word in a string
     * @see https://laravel.com/docs/11.x/strings#method-str-position
     */
    public static function position(string $subject, string $search): string {
        return strpos($subject, $search);
    }

    /**
     * Get string after a Word or Sentence
     * @see https://laravel.com/docs/11.x/strings#method-str-after
     */
    public static function after(string $subject, string $search): string {
        return strstr($subject, $search);
    }

    /**
     * Get string before a Word or Sentence
     * @see https://laravel.com/docs/11.x/strings#method-str-before
     */
    public static function before(string $subject, string $search): string {
        $parsedString = explode($search, $subject);

        return current($parsedString);
    }

    /**
     * Get Class name in a namespace as string
     * @see https://laravel.com/docs/11.x/strings#method-class-basename
     */
    public static function classBaseName(string $namespace): string {
        $parsedString = explode("\\", $namespace);

        return end($parsedString);
    }

    /**
     * Slice content of a string by Offset & Length
     * @see https://laravel.com/docs/11.x/strings#method-str-substr
     */
    public static function substr(string $subject, int $offset, int $length): string {
        return substr($subject, $offset, $length);
    }
}