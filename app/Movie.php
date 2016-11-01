<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $fillable = ['title', 'rating', 'release_date'];

    public static function recent($amountOfMovies = 15)
	{
		return self::orderBy('created_at')->take($amountOfMovies)->get();
	}
}
