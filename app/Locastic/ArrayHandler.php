<?php

namespace Locastic;

/**
 * Zadaci 2.3, 2.4, 2.5
 */
class ArrayHandler
{
    /**
     * Za dani niz vraća element/e koji se najviše puta ponavljaju.
     *
     * Zadatak 2.3
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
     * Zadatak 2.4
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
     * Vraća najduži zajednički substring od dva stringa.
     *
     * Zadatak 2.5
     *
     * @return string
     */
    public function getLongestCommonSubstring($string1, $string2)
    {
        $length1 = strlen($string1);
        $length2 = strlen($string2);
        $result         = '';
        
        if ($length1 === 0 || $length2 === 0) {
            throw new \InvalidArgumentException();
        }
        
        $longestCommonSubsequence = array();
        
        // Initialize the CSL array to assume there are no similarities
        $longestCommonSubsequence = array_fill(0, $length1, array_fill(0, $length2, 0));
        
        $largestSize = 0;
        
        for ($i = 0; $i < $length1; $i++) {
            for ($j = 0; $j < $length2; $j++) {
                // Provjera svake kombinacije znakova
                if ($string1[$i] === $string2[$j]) {
                    // These are the same in both strings
                    if ($i === 0 || $j === 0) {
                        // Radi se o prvome znaku, pa je trenutna duljina 1
                        $longestCommonSubsequence[$i][$j] = 1;
                    } else {
                        $longestCommonSubsequence[$i][$j] = $longestCommonSubsequence[$i - 1][$j - 1] + 1;
                    }
                    
                    if ($longestCommonSubsequence[$i][$j] > $largestSize) {
                        // Remember this as the largest
                        $largestSize = $longestCommonSubsequence[$i][$j];
                        // Wipe any previous results
                        $result      = '';
                        // And then fall through to remember this new value
                    }
                    
                    if ($longestCommonSubsequence[$i][$j] === $largestSize) {
                        // Remember the largest string(s)
                        $result = substr($string1, $i - $largestSize + 1, $largestSize);
                    }
                }
                // Else, $CSL should be set to 0, which it was already initialized to
            }
        }

        return $result;
    }

    /**
     * Vraća kluč najveće vrijednosti u nizu.
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
