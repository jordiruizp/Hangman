@extends('layouts.default')

@section('header')
    <div>
        <h3>Superheroes hangman</h3>
    </div>
@endsection

@section('body')
    <div id="hangman">
        <img src="{{asset('img/' . $result . '.png')}}" alt="">
    </div>
    <div id="word">
        <h1>You are a {{$result}}</h1>
        <h2>Superhero: {{$superhero}}</h2>
    </div>
@endsection