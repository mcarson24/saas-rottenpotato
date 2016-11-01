@extends('layout')

@section('content')

    <form action="{{ action('MoviesController@store') }}" method="POST">
        <label for="title">Title</label>
        <input type="text" name="title">
        <label for="title">Rating</label>
        <select name="rating" id="rating">
            <option value="G">G</option>
            <option value="PG-13">PG-13</option>
            <option value="R">R</option>
            <option value="NC-17">NC-17</option>
        </select>
        <label for="release_date">Release Date</label>
        <input type="date" name="release_date">
        <button type="submit">Add Movie</button>
    </form>

@endsection