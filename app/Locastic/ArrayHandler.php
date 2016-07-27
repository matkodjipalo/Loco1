<?php

namespace Locastic;

/**
 * Zadaci 2.3, 2.4, 2.5, 2.6.
 */
class ArrayHandler
{
    /**
     * Za dani niz vraća element/e koji se najviše puta ponavljaju.
     *
     * @param array $arr
     *
     * @return array Niz elementa koji se najviše puta ponavljaju
     *
     * @throws \InvalidArgumentException U slučaju praznog niza
     */
    public function findMostRepeatedElementOfAnArray(array $arr)
    {
        if (empty($arr)) {
            throw new \InvalidArgumentException('Proslijeđeni niz je prazan');
        }

        // asocijativni niz, ključ je element niza, a vrijednost je broj ponavljanja tog elementa
        $valuesCount = [];

        $len = count($arr);
        for ($i = 0; $i < $len; ++$i) {
            if (empty($valuesCount[$arr[$i]])) {
                $valuesCount[$arr[$i]] = 1;
            } else {
                ++$valuesCount[$arr[$i]];
            }
        }

        $mostRepeatedElementsOfArray = $this->getKeyWithLargestValueInArray($valuesCount);

        return $mostRepeatedElementsOfArray;
    }

    /**
     * Vraća najmanju vrijednost unutar niza.
     *
     * @param array $arr
     *
     * @return int
     *
     * @throws \InvalidArgumentException U slučaju praznog niza
     */
    public function getSmallestValueInArray(array $arr)
    {
        if (empty($arr)) {
            throw new \InvalidArgumentException('Proslijeđeni niz je prazan');
        }

        $len = count($arr);
        $minimum = $arr[0];
        for ($i = 1; $i < $len; ++$i) {
            if ($minimum > $arr[$i]) {
                $minimum = $arr[$i];
            }
        }

        return $minimum;
    }

    /**
     * Vraća najmanju vrijednost unutar niza.
     *
     * @param array $arr
     *
     * @return int
     */
    private function getKeyWithLargestValueInArray(array $arr)
    {
        $maxKey = null;
        $maxValue = null;

        foreach ($arr as $key => $value) {
            if (!$maxKey && !$maxValue) {
                $maxKey = $key;
                $maxValue = $value;
            } elseif ($value > $maxValue) {
                $maxKey = $key;
            }
        }

        return $maxKey;
    }
}
