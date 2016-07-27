<?php

namespace Locastic;

/**
 * Zadaci 2.3, 2.4, 2.5, 2.6
 */
class ArrayHandler
{
    /**
     * Za dani niz vraća element/e koji se najviše puta ponavljaju
     *
     * @param  array  $arr
     * @return array Niz elementa koji se najviše puta ponavljaju
     */
    public function findMostRepeatedElementOfAnArray(array $arr)
    {
        if (empty($arr)) {
            throw new \InvalidArgumentException("Proslijeđeni niz je prazan");
            
        }

        // asocijativni niz, ključ je element niza, a vrijednost je broj ponavljanja tog elementa
        $valuesCount = array_count_values($arr);

        // max broj ponvaljanja nekog elementa ili više elemenata u danome nizu
        $maxRepeatCount = max($valuesCount);

        // više elemenata može imati isti broj ponavljanja
        $mostRepeatedElementsOfArray = array_keys($valuesCount, $maxRepeatCount);

        return $mostRepeatedElementsOfArray;
    }
}