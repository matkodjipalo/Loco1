<?php

namespace tests\Locastic;

use Locastic\MathAssessment;

class MathAssessmentTest extends \PHPUnit_Framework_TestCase
{
    public function testPower()
    {
        $mathAssessment = new MathAssessment();
        $base = 2;
        $exponent = 4;

        $this->assertEquals(
            16,
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
}

