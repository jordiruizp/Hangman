@extends('layouts.default')

@section('header')
    <div id="player-name">
        <h3>Player: {{$playerName}}</h3>
    </div>
    <div id="lives">
        <h3>Lives: {{6 - $fails}}</h3>
    </div>
@endsection

@section('body')
    <div id="hangman">
        <img src="{{asset('img/hangman-' . $fails . '.jpg')}}" alt="">
    </div>
    <div id="word">
        <h1>{{$word}}</h1>
        <form action="/user-input" method="POST">
            @csrf
            <div class="form-group">
                <label for="letter">Your letter?</label>
                <input type="text" name="letter" id="letter" maxlength="1" required>
            </div>
            <button class="btn" type="submit">Send</button>
        </form>
    </div>
    <div class="failed-letters">
        @foreach ($failed as $letter)
            <span class="failed-letter">{{$letter}}</span>
        @endforeach
    </div>
@endsection