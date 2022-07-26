<?php

use App\Http\Controllers\HangmanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    [HangmanController::class, 'index']
);

Route::post(
    '/',
    [HangmanController::class, 'options']
);

Route::post(
    '/user-input',
    [HangmanController::class, 'userInput']
);
