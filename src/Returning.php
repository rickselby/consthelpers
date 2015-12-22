<?php

namespace ConstHelpers;

/**
 * Functions for getting lists of constants based on regular expressions.
 */
trait Returning
{
    /** @var array Cached array of constants **/
    private static $constList;

    /**
     * Get all constants in the class.
     *
     * @return mixed[] Array of constant values, keyed by name
     */
    public static function getAll()
    {
        return self::getConstList();
    }

    /**
     * Get a list of values of constants that start with the given string.
     *
     * @param string $regexp PRCE Regular expression to match against
     *
     * @return mixed[] Array of constant values, keyed by name
     */
    public static function getRegexp($regexp)
    {
        $refValues = [];

        foreach (self::getConstList() as $name => $value) {
            if (preg_match($regexp, $name)) {
                $refValues[$name] = $value;
            }
        }

        return $refValues;
    }

    /**
     * Get a list of constants that start with a given string.
     *
     * @param string $string
     *
     * @return mixed[] Array of constant values, keyed by name
     */
    public static function getStartsWith($string)
    {
        return self::getRegexp('/^'.$string.'/');
    }

    /**
     * Get the name of a constant based on its value. If multiple constants have
     * the same value, return false.
     *
     * @param mixed $value Value of the constant
     *
     * @return string|false
     */
    public static function getNameFor($value)
    {
        $names = array_keys(self::getConstList(), $value);
        if (count($names) == 1) {
            return $names[0];
        } else {
            return false;
        }
    }

    /**
     * Populate the list of constants, if required, and return the list.
     *
     * @return mixed[] Array of all constants, keyed by name
     */
    private static function getConstList()
    {
        if (!isset(self::$constList)) {
            self::$constList = (new \ReflectionClass(get_called_class()))->getConstants();
        }

        return self::$constList;
    }
}
