<?php

namespace Kit\Collections\Providers\String;


trait HasExtraction {
    /**
     * @see https://lodash.info/doc/split
     */
    public static function split(string $subject, string $separator): array {
        return explode($separator, $subject);
    }
}