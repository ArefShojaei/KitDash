<?php

/**
 * @namespace
 */
namespace Kit\Contracts\Interfaces\String\Traits;



/**
 * Has Escapeable interface
 * @interface
 */
interface HasEscapeable {
    /**
     * Convert special characters
     * @param string $subject
     * @return string
     */
    public static function e(string $subject): string;
}