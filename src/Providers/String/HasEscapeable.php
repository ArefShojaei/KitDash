<?php

namespace Kit\Providers\String;


trait HasEscapeable {
    /**
     * Convert special characters
     * @see https://laravel.com/docs/11.x/strings#method-e
     */
    public static function e(string $subject): string {
        return htmlspecialchars($subject);
    }
}