@extends('layout')

@section('content')

    <div id="main">

        <h2>Details About {{ $movie->title }}</h2>

        <ul id="details">
            <li>Rating: {{ $movie->rating }}</li>
            <li>Released on: {{ $movie->release_date }}</li>
        </ul>

        <p id="description">Description:<p>

        <a href="{{ action('MoviesController@edit', $movie->slug) }}">Edit</a>

        <form action="{{ action('MoviesController@destroy', $movie->slug) }}" method="POST">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type="submit">Delete</button>
        </form>

        <a href="{{ action('MoviesController@index') }}">Back to movie list</a>

    </div>



@endsection