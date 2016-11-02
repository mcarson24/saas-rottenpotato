@extends('layout')

@section('content')

    <h1>Edit {{ $movie->title }}</h1>

    <form action="{{ action('MoviesController@update', $movie->slug) }}" method="POST">
        {{ method_field('patch') }}
        @include('movies.partials.form', ['buttonText' => 'Update Movie Info'])
    </form>

@endsection
