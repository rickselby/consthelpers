<?php

namespace ConstHelpers\Tests;

use ConstHelpers\Tests\Examples;

class ReturningTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAll()
    {
        $this->assertEquals(
            [
                'POINT_NORTH' => Examples\Returning::POINT_NORTH,
                'POINT_SOUTH' => Examples\Returning::POINT_SOUTH,
                'POINT_EAST' => Examples\Returning::POINT_EAST,
                'POINT_WEST' => Examples\Returning::POINT_WEST,
                'POINT_UP' => Examples\Returning::POINT_UP,
                'POINT_DOWN' => Examples\Returning::POINT_DOWN,
                'ORIENT_NORMAL' => Examples\Returning::ORIENT_NORMAL,
                'ORIENT_INVERSE' => Examples\Returning::ORIENT_INVERSE,
            ],
            Examples\Returning::getAll()
        );
    }


    /**
     * @depends testGetAll
     *
     * @dataProvider providerTestGetRegexp
     */
    public function testGetRegexp($regexp, $array)
    {
        $this->assertEquals(
            $array,
            Examples\Returning::getRegexp($regexp)
        );
    }

    public function providerTestGetRegexp()
    {
        return [
            ['/OR/', [
                'POINT_NORTH' => Examples\Returning::POINT_NORTH,
                'ORIENT_NORMAL' => Examples\Returning::ORIENT_NORMAL,
                'ORIENT_INVERSE' => Examples\Returning::ORIENT_INVERSE,
            ]],
            ['/T_N/', [
                'POINT_NORTH' => Examples\Returning::POINT_NORTH,
                'ORIENT_NORMAL' => Examples\Returning::ORIENT_NORMAL,
            ]],
            ['/I.*S/', [
                'POINT_SOUTH' => Examples\Returning::POINT_SOUTH,
                'POINT_EAST' => Examples\Returning::POINT_EAST,
                'POINT_WEST' => Examples\Returning::POINT_WEST,
                'ORIENT_INVERSE' => Examples\Returning::ORIENT_INVERSE,
            ]],
            ['/ZXY/', []],
        ];
    }

    /**
     * @depends testGetRegexp
     *
     * @dataProvider providerTestGetStartsWith
     */
    public function testGetStartsWith($string, $array)
    {
        $this->assertEquals(
            $array,
            Examples\Returning::getStartsWith($string)
        );
    }

    public function providerTestGetStartsWith()
    {
        return [
            ['P',  [
                'POINT_NORTH' => Examples\Returning::POINT_NORTH,
                'POINT_SOUTH' => Examples\Returning::POINT_SOUTH,
                'POINT_EAST' => Examples\Returning::POINT_EAST,
                'POINT_WEST' => Examples\Returning::POINT_WEST,
                'POINT_UP' => Examples\Returning::POINT_UP,
                'POINT_DOWN' => Examples\Returning::POINT_DOWN,
            ]],
            ['O', [
                'ORIENT_NORMAL' => Examples\Returning::ORIENT_NORMAL,
                'ORIENT_INVERSE' => Examples\Returning::ORIENT_INVERSE,
            ]],
            ['X', []],
        ];
    }

}
