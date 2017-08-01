<?php

namespace App\Http\Controllers;

use App\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
	protected $sort_order;
	protected $direction;
	protected $nextDirection;

    public function index(Request $request)
	{
		$this->getSortSettings();

		$movies = Movie::sortBy($this->sort_order, $this->direction);

		return view('movies.index', ['movies' => $movies, 'sort_order' => $this->sort_order, 'nextDirection' => $this->nextDirection]);
	}

	public function create()
	{
		return view('movies.create');
	}

	public function show(Movie $movie)
	{
		return view('movies.show', compact('movie'));
	}

	public function store(Request $request)
	{
		Movie::create($request->all());

		return redirect('movies')->with('movie_status', $request->title . ' was added.');
	}

	public function edit(Movie $movie)
	{
		return view('movies.edit', compact('movie'));
	}

	public function update(Request $request, Movie $movie)
	{
		$movie->update($request->all());

		return redirect('movies/' . $movie->slug)->with('movie_status', $request->title . ' was updated.');
	}

	public function destroy(Movie $movie)
	{
		$title = $movie->title;

		$movie->delete();

		return redirect('movies')->with('movie_status', $title . ' was deleted.');
	}

	private function getSortSettings()
	{
		$this->sort_order = 'created_at';

		if (session()->has('sort_order'))
		{
			$this->sort_order = session('sort_order');
		}
		if (request('sort'))
		{
			$this->sort_order = request('sort');
		}

		$this->direction = 'asc';

		if (session()->has('order'))
		{
			$this->direction = session('order');
		}
		if (request('order'))
		{
			$this->direction = request('order');
		}

		session(['sort_order' => $this->sort_order, 'order' => $this->direction]);

		if ($this->direction == 'asc')
		{
			$this->nextDirection = 'desc';
		}
		else 
		{
			$this->nextDirection = 'asc';
		}
	}
}
