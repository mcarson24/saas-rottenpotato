<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanAddNewMovieTest extends TestCase
{
	use DatabaseMigrations;

    /** @test */
    public function a_user_can_add_a_new_movie()
	{
		$this->visit('/movies')
			 ->click('Add New Movie')
			 ->seePageIs('movies/create')
			 ->type('The Count of Monte Cristo', 'title')
			 ->select('PG-13', 'rating')
			 ->type('01/21/2002', 'release_date')
			 ->press('Add Movie')
			 ->seePageIs('movies')
			 ->see('The Count of Monte Cristo');
	}

	/** @test */
	public function a_user_can_edit_a_movie()
	{
		$movie = factory(App\Movie::class)->create([
			'title' => 'The Count of Monte Cristo',
			'rating' => 'NC-17'
		]);

		$this->visit('movies')
			 ->click('More about ' . $movie->title)
			 ->see('Details about ' . $movie->title)
			 ->click('Edit')
			 ->select('PG-13', 'rating')
			 ->type('01/21/2002', 'release_date')
			 ->press('Update Movie Info')
			 ->seePageIs('movies/the-count-of-monte-cristo')
			 ->see('PG-13')
			 ->dontSee('NC-17');
	}
}
