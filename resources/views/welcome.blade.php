@extends('layouts.default')

@section('header')

@endsection

@section('body')
    <div class="grid grid-col-1">
        <div class="relative flex justify-center">
            <img src="{{asset('img/HomeFaces.png')}}" class="start-image">
        </div>
        <div class="relative flex justify-center">
            <h1 class="main-title">Superheroes hangman</h1>
        </div>
        <div class="relative flex justify-center">
            <form action="/" method="post" class="text-center">
                @csrf
                @if (empty($players))
                    <div class="input-group">
                        <label for="num_players">Nº Players</label>
                        <input type="number" id="num_players" name="num_players" required>
                    </div>
                    <button class="btn" type="submit">Send</button>
                @else
                    @for ($i = 0; $i < $players; $i++)
                        <div class="input-group">
                            <label for="player_{{$i}}">Player {{$i+1}} name</label>
                            <input type="text" id="player_{{$i}}" name="players[]" required>
                        </div>
                    @endfor
                    <button class="btn" type="submit">Start</button>
                @endif
            </form>
        </div>
    </div>
@endsection

@section('scripts-footer')
    @if (empty($players))
        <script>
            window.onload = function() {
                document.getElementById("num_players").focus();
            }
        </script>
    @else
        <script>
            window.onload = function() {
                document.getElementById("player_0").focus();
            }
        </script>
    @endif
@endsection