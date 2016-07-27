<?php

namespace Locastic;

class PalindromChecker
{
    /**
     * Provjerava je li string palindrom.
     *
     * @param string $string
     *
     * @return bool
     */
    public function isStringPalindrom($string)
    {
        $string = $this->removeAllWhitespaces($string);
        $string = mb_strtolower($string, 'UTF-8');
        if (mb_strlen($string, 'UTF-8') < 3) {
            throw new \InvalidArgumentException('Odlučio san da se može testirati samo string dužine 3 i više znakova');
        }

        $reverse = $this->utf8Strrev($string);
        $reverse = $this->removeAllWhitespaces($reverse);

        return $string == $reverse;
    }

    private function utf8Strrev($str)
    {
        preg_match_all('/./us', $str, $ar);

        return implode('', array_reverse($ar[0]));
    }

    private function removeAllWhitespaces($string)
    {
        $newString = preg_replace('/\s+/', '', $string);

        return $newString;
    }
}
