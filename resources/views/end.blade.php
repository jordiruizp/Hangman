@extends('layouts.default')

@section('header')
    <section class="main-header flex px-6">
        <div class="header-content text-left">
            <h3>Superheroes hangman</h3>
        </div>
    </section>
@endsection

@section('body')
    <div id="hangman">
        <img src="{{asset('img/' . $result . '.png')}}" alt="">
    </div>
    <div class="text-center">
        <h1>You are a {{$result}}</h1>
        <h2>Superhero: {{$superhero}}</h2>
        <a href="/" class="btn">New game</a>
    </div>
@endsection