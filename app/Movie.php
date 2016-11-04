<?php

namespace App;

use Carbon\Carbon;
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

	public function getNiceReleaseDateAttribute()
	{
		$date = new Carbon($this->release_date);

		return $date->format('F j, Y');
	}

	public static function findBySlug($slug)
	{
		return self::where('slug', $slug)->firstOrFail();
	}

    public static function recent($amountOfMovies = 15)
	{
		return self::latest('created_at')->take($amountOfMovies)->get();
	}
}
