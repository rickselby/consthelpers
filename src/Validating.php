<?php

namespace ConstHelpers;

/**
 * Abstract class for classes defining constants.
 */
trait Validating
{
    use Returning;

    /**
     * Check if the given value matches a constant that matches the given regular expression.
     *
     * @param mixed  $value
     * @param string $regexp
     *
     * @return bool
     */
    public static function isValid($value, $regexp)
    {
        return in_array($value, self::getRegexp($regexp));
    }

    /**
     * Check if the given value matches a constants that starts with the given string.
     *
     * @param mixed  $value
     * @param string $string
     *
     * @return bool
     */
    public static function isValidStartsWith($value, $string)
    {
        return in_array($value, self::getStartsWith($string));
    }
}
