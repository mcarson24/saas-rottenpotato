<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Movie extends Model
{
	use Sluggable;

	protected $fillable = ['title', 'rating', 'release_date'];

	protected $dates = ['release_date'];

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

	public function getReleaseDateAttribute($release_date)
	{
		$date = new Carbon($release_date);

		return $date->format('F j, Y');
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
