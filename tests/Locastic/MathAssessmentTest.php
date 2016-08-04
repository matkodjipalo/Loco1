<?php

namespace Tests\Locastic;

use Locastic\MathAssessment;

class MathAssessmentTest extends \PHPUnit_Framework_TestCase
{
    public function testPower()
    {
        $mathAssessment = new MathAssessment();
        $base = 2;
        $exponent = 10;

        $this->assertEquals(
            1024,
            $mathAssessment->power($base, $exponent)
        );
    }

    /**
     * @dataProvider randomIntProvider
     */
    public function testPowerZero($base)
    {
        $mathAssessment = new MathAssessment();
        $exponent = 0;

        $this->assertEquals(
            1,
            $mathAssessment->power($base, $exponent)
        );
    }

    public function testGroupArrayByCloseToEqualSums()
    {
        $mathAssessment = new MathAssessment();
        $arr = [2, 1, 4, 7, 1, 2, 6, 8];
        $numberOfGroups = 3;

        $this->assertEquals(
            [[8, 2], [7, 2, 1], [6, 4, 1]],
            $mathAssessment->groupArrayByCloseToEqualSums($arr, $numberOfGroups)
        );
    }

    public function randomIntProvider()
    {
        return [
            [33],
            [4321],
            [232323],
            [121],
            [3222],
            [1567],
            [895],
            [44],
            [3435],
        ];
    }
}
