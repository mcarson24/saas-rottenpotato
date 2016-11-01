@extends('layout')

@section('content')

    <form action="{{ action('MoviesController@store') }}" method="POST">
        @include('movies.partials.form', ['buttonText' => 'Add Movie'])
    </form>

@endsection