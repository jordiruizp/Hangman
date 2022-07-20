<?php

namespace App\Http\Controllers;

use App\Services\Hangman;
use App\Services\Superhero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HangmanController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function options(Request $request)
    {
        if (! empty($request->num_players)) {
            return view('welcome')->with('players', $request->num_players);
        } else {
            if (! empty($request->players)) {
                $this->initializeGame($request->players);
                $wordToPrint = Hangman::getWordToPrint();

                return view('hangman')
                        ->with('playerName', Cache::get('Players')[Cache::get('PlayerPosition')])
                        ->with('word', $wordToPrint)
                        ->with('guessed', Cache::get('GuessedLetters'))
                        ->with('failed', Cache::get('FailedLetters'))
                        ->with('lives', Cache::get('Lives'));
            } else {
                return view('welcome');
            }
        }
    }

    protected function initializeGame($playersName)
    {
        $superhero = Superhero::get();
        $superheroLetters = Hangman::getSuperheroLetters($superhero);
        Cache::put('Players', $playersName);
        Cache::put('Superhero', $superhero);
        Cache::put('Lives', 7);
        Cache::put('PlayerPosition', 0);
        Cache::put('SuperheroLetters', $superheroLetters);
        Cache::put('ValidLetters', Hangman::getSuperheroLength($superheroLetters));
        Cache::put('GuessedLetters', []);
        Cache::put('FailedLetters', []);
    }
}
