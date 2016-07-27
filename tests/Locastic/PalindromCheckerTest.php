<?php

namespace Tests\Locastic;

use Locastic\PalindromChecker;

class PalindromCheckerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider palindromProvider
     */
    public function testStringIsPalindrom($string)
    {
        $palindromChecker = new PalindromChecker();
        $this->assertTrue($palindromChecker->isStringPalindrom($string));
    }

    public function testStringIsNotPalindrom()
    {
        $string = "Anal";
        $palindromChecker = new PalindromChecker();
        $this->assertFalse($palindromChecker->isStringPalindrom($string));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        $string = "čč";
        $palindromChecker = new PalindromChecker();
        $palindromChecker->isStringPalindrom($string);
    }

    public function palindromProvider()
    {
        return [
                ["Ana"],
                ["Dud"],
                ["Ići"],
                ["Kapak"],
                ["Kisik"],
                ["Krk"],
                ["Kuk"],
                ["Nadan"],
                ["Neven"],
                ["Oko"],
                ["Potop"],
                ["Radar"],
                ["Ratar"],
                ["Rotor"],
                ["A mene tu ni minute nema"],
                ["Ana nabra par banana"],
                ["Ana voda Radovana"],
                ["Ana voli Milovana"],
                ["E sine ženi se"],
                ["Edo gaji jagode"],
                ["Ero ratar ore"],
                ["Evo love"],
                ["Evo sada sove"],
                ["I jogurt ujutru goji"],
                ["I on ukrao arku Noi"],
                ["Ide Neven Edi"],
                ["Idi Milane na Lim idi"],
                ["Imaju Arapi i para u jami"],
                ["Imamo ono o mami"],
                ["Ivan uru navi"],
                ["I Ruža žuri"],
                ["Kuma pali lila pamuk"],
                ["Mače jede ječam"],
                ["Medeja ja jedem"],
                ["Na Limu Milan"],
                ["Nadan Ivi kivi na dan"],
                ["Nakrao Arkan"],
                ["Navi uru Ivan"],
                ["Nema Kata kamen"],
                ["On vidi divno"],
                ["Oruđa doda Đuro"],
                ["Ovo je muka kume Jovo"],
                ["Perica reže raci rep"],
                ["Sava zidar radi za vas"],
                ["Sir ima miris"],
                ["Tupan Edo ode na put"],
                ["U maju udovica baci vodu u jamu"],
                ["U Šidu udišu"],
                ["Uguraj u jarugu"],
                ["Ujak ima radar a mi Kaju"],
        ];
    }
}