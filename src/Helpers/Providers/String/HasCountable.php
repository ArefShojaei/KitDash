<?php

namespace Kit\Helpers\Providers\String;


trait HasCountable {
    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-length
     */
    public static function length(string $subject): int {
        return strlen($subject);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-word-count
     */
    public static function wordCount(string $subject): string {
        return str_word_count($subject);
    }
}