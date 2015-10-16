[![Build Status](https://travis-ci.org/rickselby/consthelpers.svg?branch=master)](https://travis-ci.org/rickselby/consthelpers)

Helper traits to use when using a class with many constants.

Also a place for me to test CI stuff.

## Example

```php
class DataRef
{
    use \ConstHelpers\Validating;

    const POINT_NORTH = 0;
    const POINT_SOUTH = 1;
    const POINT_EAST = 2;
    const POINT_WEST = 3;
    const POINT_UP = 4;
    const POINT_DOWN = 5;

    const ORIENT_NORMAL = 6;
    const ORIENT_INVERSE = 7;
}

// Get the list of constants that start with 'POINT_'
$consts = DataRef::startsWith('POINT_'));

// Validate a value against the constants starting with 'POINT_'
if (DataRef::isValidStartsWith($value, 'POINT_')) {
...

// Validate against constants matching a regular expression
if (DataRef::isValid($value, '/T.*E/')) {
...

```

