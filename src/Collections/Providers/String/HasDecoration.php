<?php

namespace Kit\Providers\String;


trait HasDecoration {
    /**
     * Remove all white spaces
     * @see https://laravel.com/docs/11.x/strings#method-str-squish
     */
    public static function squish(string $subject): string {
        $content = preg_replace_callback("/(?<space> ){2,}/", function ($matches) {
            return " ";
        }, $subject);

        return trim($content);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-trim
     */
    public static function trim($subject, $chars = " "): string {
        return trim($subject, $chars);
    }
}