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

	public function store(Request $request)
	{
		Movie::create($request->all());

		return redirect('movies');
	}

	public function edit(Request $request)
	{
		$movie = Movie::findBySlug($request->slug);

		return view('movies.edit');
	}
}
