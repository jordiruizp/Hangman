<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class Hangman
{
    public static function getSuperheroLetters($superheroName)
    {
        $nameLetters = str_split($superheroName);

        return $nameLetters;

        $valigNameLength = 0;
        foreach ($nameLetters as $letter) {
            if ($letter !== '-' or $letter !== " ") {
                $valigNameLength++;
            }
        }
    }

    public static function getSuperheroLength($superheroLetters)
    {
        $valigNameLength = 0;
        foreach ($superheroLetters as $letter) {
            if ($letter !== '-' or $letter !== " ") {
                $valigNameLength++;
            }
        }

        return $valigNameLength;
    }

    public static function getWordToPrint()
    {
        $superheroLetters = Cache::get('SuperheroLetters');
        $guessedLetters = Cache::get('GuessedLetters');

        $wordToPrint = [];
        foreach ($superheroLetters as $letter) {
            if ($letter === ' ' or $letter === '-' or in_array($letter, $guessedLetters)) {
                $wordToPrint[] = $letter;
            } else {
                $wordToPrint[] = '_';
            }
        }

        return implode($wordToPrint);
    }
}
