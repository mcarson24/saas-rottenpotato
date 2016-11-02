@extends('layout')

@section('content')

    <h1>Create New Movie</h1>

    <form action="{{ action('MoviesController@store') }}" method="POST">
        @include('movies.partials.form', ['buttonText' => 'Add Movie'])
    </form>

@endsection