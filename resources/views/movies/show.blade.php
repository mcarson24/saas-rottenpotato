@extends('layout')

@section('content')

    <h1>Details About {{ $movie->title }}</h1>

    <a href="{{ action('MoviesController@edit', $movie->slug) }}">Edit</a>

@endsection