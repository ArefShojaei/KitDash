<?php

namespace Kit\Helpers\Providers\String;


trait HasValidation {
    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-is-json
     */
    public static function isJSON(string $json): bool {
        return (bool) json_decode($json, true);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-is-url
     */
    public static function isURL(string $url): bool {
        $parsedURL = parse_url($url);

        if (!isset($parsedURL["scheme"])) return false;

        return true;
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-fluent-str-is-empty
     */
    public static function isEmpty(string $subject): bool {
        return empty($subject);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-contains
     */
    public static function contains(string $subject, string $search): bool {
        return str_contains($subject, $search);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-str-contains-all
     */
    public static function containsAll(string $subject, array $search): bool {
        $state = false;

        # Iterate on $search as Array of Words
        foreach ($search as $word) {
            $status = str_contains($subject, $word);

            # Not exists
            if (!$status) {
                $state = false;
                break;
            }

            # Is exists
            $state = $status;
        }

        return $state;
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-ends-with
     */
    public static function endsWith(string $subject, string $search): bool {
        return str_ends_with($subject, $search);
    }

    /**
     * @see https://laravel.com/docs/11.x/strings#method-starts-with
     */
    public static function startsWith(string $subject, string $search): bool {
        return str_starts_with($subject, $search);
    }
}