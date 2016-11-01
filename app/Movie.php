<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Movie extends Model
{
	use Sluggable;

	protected $fillable = ['title', 'rating', 'release_date'];

	public function getRouteKey()
	{
		return 'slug';
	}

	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	public static function findBySlug($slug)
	{
		return self::where('slug', $slug)->firstOrFail();
	}

    public static function recent($amountOfMovies = 15)
	{
		return self::orderBy('created_at')->take($amountOfMovies)->get();
	}
}
