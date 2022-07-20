@extends('layouts.default')

@section('header')

@endsection

@section('body')
    <div class="grid grid-col-1">
        <div class="relative flex">
            <img src="{{asset('img/HomeFaces.png')}}" alt="">
        </div>
        <div class="relative flex">
            <h1>Superheroes hangman</h1>
        </div>
        <div class="relative flex">
            <form action="/" method="post">
                @csrf
                @if (empty($players))
                    <div class="input-group">
                        <label for="num_players">Nº Players</label>
                        <input type="number" id="num_players" name="num_players" required>
                    </div>
                    <button type="submit">Send</button>
                @else
                    @for ($i = 0; $i < $players; $i++)
                        <div class="input-group">
                            <label for="player_{{$i}}">Player {{$i+1}} name</label>
                            <input type="text" id="player_{{$i}}" name="players[]" required>
                        </div>
                    @endfor
                    <button type="submit">Start</button>
                @endif
            </form>
        </div>
    </div>
@endsection