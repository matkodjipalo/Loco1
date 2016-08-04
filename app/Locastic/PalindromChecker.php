<?php

namespace Locastic;

/**
 * 2.1. zadatak.
 */
class PalindromChecker
{
    /**
     * Provjerava je li string palindrom.
     *
     * @param string $string
     *
     * @return bool
     *
     * @throws \InvalidArgumentException U slučaju prekratkog string
     */
    public function isStringPalindrom($string)
    {
        $string = $this->removeAllWhitespaces($string);
        $string = mb_strtolower($string, 'UTF-8');
        if (mb_strlen($string, 'UTF-8') < 3) {
            throw new \InvalidArgumentException(
                'Odlučio san da se može testirati samo string dužine 3 i više znakova'
            );
        }

        $reverse = $this->utf8StrRev($string);
        $reverse = $this->removeAllWhitespaces($reverse);

        return $string == $reverse;
    }

    /**
     * Provjerava je li string palindrom bez suvišnog korištenja PHP funkcija.
     *
     * @param string $str
     *
     * @return bool
     */
    public function isStringPalindromHardWay($str)
    {
        $str = $this->removeWhiteSpacesHardWay($str);
        $length = count($str);
        $reversedString = [];

        for ($i = 0; $i < $length; ++$i) {
            $reversedString[$length - ($i + 1)] = $str[$i];
        }

        return $reversedString == $str;
    }

    /**
     * @param string $str
     *
     * @return string
     */
    private function utf8StrRev($str)
    {
        preg_match_all('/./us', $str, $ar);

        return implode('', array_reverse($ar[0]));
    }

    /**
     * @param string $string
     *
     * @return string
     */
    private function removeAllWhitespaces($string)
    {
        $newString = preg_replace('/\s+/', '', $string);

        return $newString;
    }

    /**
     * @param string $str
     *
     * @return array
     */
    private function removeWhiteSpacesHardWay($str)
    {
        $length = strlen($str);

        $noWhitespacesString = [];
        for ($i = 0; $i < $length; ++$i) {
            if ($str[$i] != ' ') {
                $noWhitespacesString[] = strtolower($str[$i]);
            }
        }

        return $noWhitespacesString;
    }
}
