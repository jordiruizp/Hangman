@extends('layouts.default')

@section('header')
    <div id="player-name">
        <h3>Player: {{$playerName}}</h3>
    </div>
    <div id="lives">
        <h3>Lives: {{$lives}}</h3>
    </div>
@endsection

@section('body')
    <div id="hangman"></div>
    <div id="word">
        <h1>{{$word}}</h1>
    </div>
@endsection