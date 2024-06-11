<?php

/**
 * @namespace
 */
namespace Kit\Features\String;



/**
 * Has Escapeable
 * @trait
 */
trait HasEscapeable {
    /**
     * Convert special characters
     * @see https://laravel.com/docs/11.x/strings#method-e
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string {
        return htmlspecialchars($subject);
    }
}