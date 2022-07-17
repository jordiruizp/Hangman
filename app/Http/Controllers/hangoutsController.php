<?php

namespace App\Http\Controllers;

use App\Services\Superhero;
use Illuminate\Http\Request;

class HangoutsController extends Controller
{
    public function index()
    {
        $superhero = Superhero::get();

        return view('welcome')->with('superheroe', $superhero);
    }
}
