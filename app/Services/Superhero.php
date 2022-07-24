<?php

namespace App\Services;

class Superhero
{
    /**
     * Read file with super heroes names
     */
    protected function parseJson()
    {
        $fileURL = env('SUPERHERO_FILE', '/data/superheroes.json');
        $superheroesFile = file_get_contents(storage_path() . $fileURL);
        if (empty($superheroesFile)) {
            return false;
        }

        $superheroesData = json_decode($superheroesFile, true);
        if (empty($superheroesData) or !is_array($superheroesData) or empty($superheroesData['superheroes'])) {
            return false;
        }

        return $superheroesData['superheroes'];
    }

    /**
     * Get a random superhero from a JSON File
     */
    public static function get()
    {
        $superheroes = self::parseJson();
        if (empty($superheroes)) {
            return false;
        }
        $randomSuperheroPosition = random_int(0, count($superheroes) - 1);

        return $superheroes[$randomSuperheroPosition]['name'];
    }
}
