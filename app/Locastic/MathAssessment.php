<?php

namespace Locastic;

/**
 * Zadaci 2.2, 2.6 i 2.7.
 */
class MathAssessment
{

    /**
     * Funkcija prima dva integer parametra n i m, te kao rezultat vraća vrijednost n^m.
     *
     * Zadatak 2.2
     *
     * @param int $base
     * @param int $exp
     *
     * @return int
     */
    public function power($base, $exp)
    {
        $result = 1;
        for ($i = 0; $i < $exp; ++$i) {
            $result *= $base;
        }

        return $result;
    }

    /**
     * Dijeli niz integera u dani broj grupa na način da je suma svih
     * članova unutar pojedine grupe što je moguće bliža
     *
     * Zadatak 2.6
     *
     * @param array $arr
     * @param int   $groupsToSplitAnArray
     *
     * @return array
     */
    public function groupArrayByCloseToEqualSums(array $arr, $groupsToSplitAnArray)
    {
        $groups = [];
        $groupSums = [];
        $leftOvers = [];

        $arrSum = 0;
        $arrCount = count($arr);
        $arr = $this->bubbleSort($arr);

        for ($i = 0; $i < $arrCount; ++$i) {
            $arrSum += $arr[$i];
        }

        $partitionSum = $arrSum / $groupsToSplitAnArray;

        for ($i = 0; $i < $groupsToSplitAnArray; ++$i) {
            $groups[$i] = [];
            $groupSums[$i] = 0;
        }

        for ($i = 0; $i < $arrCount; ++$i) {
            $elem = $arr[$i];
            for ($j = 0; $j < $groupsToSplitAnArray; ++$j) {
                $tempSum = $groupSums[$j];
                if ($tempSum + $elem <= $partitionSum) {
                    $groupSums[$j] += $elem;
                    $groups[$j][] = $elem;
                    unset($elem);
                    break;
                }
            }
            if (!empty($elem)) {
                $leftOvers[] = $elem;
            }
        }

        if ($leftOvers) {
            $leftOversCount = count($leftOvers);
            for ($i = 0; $i < $leftOversCount; ++$i) {
                $groups[$groupsToSplitAnArray - 1 - $i][] = $leftOvers[$i];
            }
        }

        return $groups;
    }

    /**
     * Ispisuje brojeve od 1 do 100, ali na način da za brojeve koji su djeljivi s tri ispiše “LOCA”,
     * za brojeve koji su djeljivi sa 5 ispiše “STIC”,
     * a za brojeve koji su djeljivi i sa 3 i sa 5 ispišite “LOCASTIC”.
     *
     * Zadatak 2.7
     */
    public function locasticModulo()
    {
        for ($i = 1; $i <= 100; ++$i) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo 'LOCASTIC';
                echo '<br>';
            } elseif ($i % 3 == 0) {
                echo 'LOCA';
                echo '<br>';
            } elseif ($i % 5 == 0) {
                echo 'STIC';
                echo '<br>';
            } else {
                echo $i;
                echo '<br>';
            }
        }
    }

    private function bubbleSort($array)
    {
        if (!$length = count($array)) {
            return $array;
        }
        for ($outer = 0; $outer < $length; ++$outer) {
            for ($inner = 0; $inner < $length; ++$inner) {
                if ($array[$outer] > $array[$inner]) {
                    $tmp = $array[$outer];
                    $array[$outer] = $array[$inner];
                    $array[$inner] = $tmp;
                }
            }
        }

        return $array;
    }
}
