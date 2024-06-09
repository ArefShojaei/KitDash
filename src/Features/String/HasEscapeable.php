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
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string {
        return htmlspecialchars($subject);
    }
}