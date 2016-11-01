<?php

use App\Movie;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAllMoviesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function anyone_can_see_all_movies()
	{
		$movies = $this->createMovies(5);

		$this->visit('/movies')
			 ->assertViewHas('movies');
	}

	/** @test */
	public function see_the_correct_amount_of_movies()
	{
		$movies = $this->createMovies(10);

		$this->visit('/movies')
			 ->assertCount($movies->count(), $movies);
	}

	/** @test */
	public function see_only_the_most_recent_movies()
	{
		factory(Movie::class, 25)->create([
			'rating' => 'G'
		]);

		$recent = Movie::recent();

		$this->visit('/movies')
			 ->assertCount(15, $recent);
	}

	/** @test */
	public function see_a_certain_movie_in_the_movies_list()
	{
		$movies = $this->createMovies(3);
		$movieToFind = factory(App\Movie::class)->create([
			'title' => 'The Count of Monte Cristo'
		]);
		$moreMovies = $this->createMovies(6);

		$this->visit('movies')
			 ->see($movieToFind->title);
	}

	private function createMovies($amount)
	{
		return factory(App\Movie::class, $amount)->create();
	}
}
