@extends('layouts.default')

@section('header')
    <section class="main-header flex px-6">
        <div id="player-name" class="header-content text-left">
            <h3>Player: {{$playerName}}</h3>
        </div>
        <div id="lives" class="header-content text-right">
            <h3>Lives: {{6 - $fails}}</h3>
        </div>
    </section>
@endsection

@section('body')
    <div class="grid grid-cols-1">
        <div class="hangman flex">
            <div id="hangman">
                <img src="{{asset('img/hangman-' . $fails . '.jpg')}}" alt="">
            </div>
            <div id="word">
                <h1>{{$word}}</h1>
                <form action="/user-input" method="POST" class="text-center">
                    @csrf
                    <div class="form-group">
                        <label for="letter">Your letter?</label>
                        <input type="text" name="letter" id="letter" maxlength="1" required>
                    </div>
                    <button class="btn" type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="failed-letters">
            <h5>Failed letters</h5>
            @foreach ($failed as $letter)
                <span class="failed-letter">{{$letter}}</span>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts-footer')
    <script>
        window.onload = function() {
            document.getElementById("letter").focus();
        }
    </script>
@endsection