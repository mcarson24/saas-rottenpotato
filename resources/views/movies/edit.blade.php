@extends('layout')

@section('content')

    <form action="{{ action('MoviesController@update', $movie->slug) }}" method="POST">
        {{ method_field('patch') }}
        @include('movies.partials.form', ['buttonText' => 'Update Movie Info'])
    </form>

@endsection
