<?php

namespace ConstHelpers\Tests;

use ConstHelpers\Tests\Examples;

class ValidatingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerTestIsValid
     */
    public function testIsValid($value, $regexp, $expected)
    {
        $this->assertEquals(
            $expected,
            Examples\Validating::isValid($value, $regexp)
        );
    }

    public function providerTestIsValid()
    {
        return [
            [Examples\Validating::POINT_NORTH, '/OR/', true],
            [Examples\Validating::POINT_SOUTH, '/OR/', false],
            [Examples\Validating::ORIENT_NORMAL, '/T_N/', true],
            [Examples\Validating::ORIENT_INVERSE, '/T_N/', false],
            [Examples\Validating::POINT_EAST, '/I.*S/', true],
            [Examples\Validating::ORIENT_NORMAL, '/I.*S/', false],
            [Examples\Validating::ORIENT_NORMAL, '/ZXY/', false],
        ];
    }

    /**
     * @dataProvider providerTestIsValidStartsWith
     */
    public function testIsValidStartsWith($value, $regexp, $expected)
    {
        $this->assertEquals(
            $expected,
            Examples\Validating::isValidStartsWith($value, $regexp)
        );
    }

    public function providerTestIsValidStartsWith()
    {
        return [
            [Examples\Validating::POINT_NORTH, 'P', true],
            [Examples\Validating::ORIENT_INVERSE, 'P', false],
            [Examples\Validating::ORIENT_NORMAL, 'O', true],
            [Examples\Validating::POINT_WEST, 'O', false],
            [Examples\Validating::POINT_SOUTH, 'X', false],
        ];
    }

}
