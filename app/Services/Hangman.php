<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class Hangman
{
    public static function getSuperheroLetters($superheroName)
    {
        $nameLetters = str_split(Str::upper($superheroName));

        return $nameLetters;
    }

    public static function getSuperheroLength($superheroLetters)
    {
        $valigNameLength = 0;
        foreach ($superheroLetters as $letter) {
            if ($letter != '-' and $letter != " ") {
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
            if ($letter === ' ' or $letter === '-' or in_array(Str::upper($letter), $guessedLetters)) {
                $wordToPrint[] = $letter;
            } else {
                $wordToPrint[] = '_';
            }
        }

        return implode($wordToPrint);
    }

    public static function checkUserLetter($letter)
    {
        $superheroLetters = Cache::get('SuperheroLetters');
        if (in_array($letter, Cache::get('GuessedLetters'))) {
            return;
        }

        if (in_array($letter, $superheroLetters)) {
            $guessedLetters = Cache::get('GuessedLetters');
            $guessedLetters[] = $letter;
            foreach ($superheroLetters as $superheroLetter) {
                if ($superheroLetter === $letter) {
                    Cache::increment('Success');
                }
            }
            Cache::put('GuessedLetters', $guessedLetters);
        } else {
            $failedLetters = Cache::get('FailedLetters');
            $failedLetters[] = $letter;
            Cache::put('FailedLetters', $failedLetters);
            Cache::increment('Fails');
        }
        Cache::increment('PlayerPosition');
        if ((Cache::get('PlayerPosition') + 1) > count(Cache::get('Players'))) {
            Cache::put('PlayerPosition', 0);
        }
    }
}
