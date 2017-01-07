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

	public static function ratings()
	{
		return self::distinct('rating')->orderBy('rating')->pluck('rating');
	}

	public static function findBySlug($slug)
	{
		return self::where('slug', $slug)->firstOrFail();
	}

    public static function recent($amountOfMovies = 15)
	{
		return self::latest('created_at')->take($amountOfMovies)->get();
	}

	public static function sortBy($sort_order, $direction, $amountOfMovies = 15)
	{
		if ($sort_order == 'created_at')
		{
			return self::recent();
		}
		
		return self::orderBy($sort_order, $direction)->take($amountOfMovies)->get();
	}
}
