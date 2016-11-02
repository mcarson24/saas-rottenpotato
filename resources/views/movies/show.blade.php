@extends('layout')

@section('content')

    <h1>Details About {{ $movie->title }}</h1>

    <h3>{{ $movie->rating }}</h3>

    <a href="{{ action('MoviesController@edit', $movie->slug) }}">Edit</a>

@endsection