<?php

namespace App\Http\Controllers;

use App\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index(Request $request)
	{
		$sort_order = 'created_at';
		if (session()->has('sort_order'))
		{
			$sort_order = session('sort_order');
		}
		if ($request->input('sort'))
		{
			$sort_order = request('sort');
		}

		$direction = 'asc';
		if (session()->has('order'))
		{
			$direction = session('order');
		}
		if (request('order'))
		{
			$direction = request('order');
		}

		if ($direction == 'asc')
		{
			$nextDirection = 'desc';
		}
		else 
		{
			$nextDirection = 'asc';
		}

		session(['sort_order' => $sort_order, 'order' => $direction]);

		$movies = Movie::sortBy($sort_order, $direction);

		return view('movies.index', compact('movies', 'sort_order', 'nextDirection'));
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
}
