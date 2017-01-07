@extends('layout')

@section('content')

    <h1>All Movies</h1>

    @if (session()->has('movie_status'))
        <span>{{ session('movie_status') }}</span>
    @endif
    <table id="movies">
        <thead>
            <tr>
                <th class="{{ $sort_order == 'title' ? 'sorted' : '' }}">
                    <a href="{{ action('MoviesController@index', ['sort' => 'title']) }}" id="title_header">Movie Title</a>
                </th>
                <th>Rating</th>
                <th class="{{ $sort_order == 'release_date' ? 'sorted' : '' }}">
                    <a href="{{ action('MoviesController@index', ['sort' => 'release_date']) }}" id="release_date_header">Release Date</a>
                </th>
                <th>More Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr class="movie">
                    <td class="movie-title">{{ $movie->title }}</td>
                    <td class="rating">{{ $movie->rating }}</td>
                    <td class="release_date">{{ $movie->nice_release_date }}</td>
                    <td><a href="{{ action('MoviesController@show', ['slug' => $movie->slug]) }}">More about {{ $movie->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ action('MoviesController@create') }}">Add New Movie</a>

@endsection