<?php

namespace tests\Locastic;

use Locastic\ArrayHandler;

class ArrayHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function testFindMostRepeatedElementOfAnArray()
    {
        $arrHandler = new ArrayHandler();
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 8, 9];

        $this->assertEquals(
            8,
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

    public function testGetSmallestValueInArray()
    {
        $arrHandler = new ArrayHandler();
        $arr = [3, 2, 1, 4, 5, 6, 7, 8, 9, 1, 1000, 12];

        $this->assertEquals(
            1,
            $arrHandler->getSmallestValueInArray($arr)
        );
    }

    public function testGetLongestCommonSubstring()
    {
        $arrHandler = new ArrayHandler();
        $str1 = 'ante';
        $str2 = 'Kant';

        $this->assertEquals(
            'ant',
            $arrHandler->getLongestCommonSubstring($str1, $str2)
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetCommonSubstringWhereOneStringIsEmpty()
    {
        $arrHandler = new ArrayHandler();
        $str1 = '';
        $str2 = 'Kant';

        $arrHandler->getLongestCommonSubstring($str1, $str2);
    }

    public function testGetCommonSubstringWhenStringsAreTotallyDifferent()
    {
        $arrHandler = new ArrayHandler();
        $str1 = 'abcčćdđefgh';
        $str2 = 'žzuwrpošytr';

        $this->assertSame(
            '',
            $arrHandler->getLongestCommonSubstring($str1, $str2)
        );
    }
}
