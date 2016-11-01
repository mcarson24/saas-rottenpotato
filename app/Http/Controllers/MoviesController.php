<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
	{
		$movies = Movie::recent(10);

		return view('movies.index', compact('movies'));
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

		return redirect('movies');
	}

	public function edit(Movie $movie)
	{
		return view('movies.edit');
	}
}
