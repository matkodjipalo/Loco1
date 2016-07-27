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
}

