<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <ul>
            @foreach ($movies as $movie)
                <li>
                    <span class="title">{{ $movie->title }}</span>
                    <span class="more_info"><a href="{{ action('MoviesController@show', ['slug' => $movie->slug]) }}">More about {{ $movie->title }}</a></span>
                </li>
            @endforeach
        </ul>
        <a href="{{ action('MoviesController@create') }}">Add New Movie</a>
    </body>
</html>