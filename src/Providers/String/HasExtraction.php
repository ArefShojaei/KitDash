<?php

namespace Kit\Providers\String;


trait HasExtraction {
    /**
     * Split content of a string by Separator
     * @see https://lodash.info/doc/split
     */
    public static function split(string $subject, string $separator): array {
        return explode($separator, $subject);
    }
}