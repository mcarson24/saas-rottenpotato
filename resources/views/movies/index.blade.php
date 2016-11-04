@extends('layout')

@section('content')

    <h1>All Movies</h1>

    @if (session()->has('movie_status'))
        <span>{{ session('movie_status') }}</span>
    @endif
    <table id="movies">
        <thead>
            <tr>
                <th>Movie Title</th>
                <th>Rating</th>
                <th>Release Date</th>
                <th>More Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->nice_release_date }}</td>
                    <td><a href="{{ action('MoviesController@show', ['slug' => $movie->slug]) }}">More about {{ $movie->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ action('MoviesController@create') }}">Add New Movie</a>

@endsection