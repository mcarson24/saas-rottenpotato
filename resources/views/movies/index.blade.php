@extends('layout')

@section('content')
        <ul>
            @foreach ($movies as $movie)
                <li>
                    <span class="title">{{ $movie->title }}</span>
                    <span class="more_info"><a href="{{ action('MoviesController@show', ['slug' => $movie->slug]) }}">More about {{ $movie->title }}</a></span>
                </li>
            @endforeach
        </ul>
        <a href="{{ action('MoviesController@create') }}">Add New Movie</a>
@endsection