<?php

namespace Kit\Support\Traits\String;

trait Escapable
{
    /**
     * Convert special characters (escape) content
     * @see https://laravel.com/docs/11.x/strings#method-e
     */
    public static function e(string $subject): string
    {
        return htmlspecialchars($subject);
    }
}
