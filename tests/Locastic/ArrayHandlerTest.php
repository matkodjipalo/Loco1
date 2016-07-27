<?php

namespace tests\Locastic;

use Locastic\ArrayHandler;

class ArrayHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testFindMostRepeatedElementOfAnArray()
    {
        $arrHandler = new ArrayHandler();
        $arr = [1, 2, 3, 4, 5, 5, 6, 7, 8, 9, 9];

        $this->assertEquals(
            [5, 9],
            $arrHandler->findMostRepeatedElementOfAnArray($arr)
        );
    }

    public function testFindMostRepeatedElementOfAnArrayOfOne()
    {
        $arrHandler = new ArrayHandler();
        $arr = ['one'];

        $this->assertEquals(
            $arr,
            $arrHandler->findMostRepeatedElementOfAnArray($arr)
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFindMostRepeatedElementOfAnArrayOfNone()
    {
        $arrHandler = new ArrayHandler();
        $arr = [];

        $this->assertEquals(
            $arr,
            $arrHandler->findMostRepeatedElementOfAnArray($arr)
        );
    }
}
