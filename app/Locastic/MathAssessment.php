<?php

namespace Locastic;

/**
 * Zadaci 2.2, 2.6 i 2.7.
 */
class MathAssessment
{
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
}
