<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CanDeleteMovieTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function a_user_can_delete_a_movie()
	{
		$movie = factory(\App\Movie::class)->create([
			'title' => 'Star Trek: First Contact',
			'slug' => 'star-trek-first-contact'
		]);

		$this->visit('/')
			 ->see($movie->title)
			 ->click('More about Star Trek: First Contact')
			 ->seePageIs('movies/star-trek-first-contact')
			 ->press('Delete')
			 ->seePageIs('movies')
			 ->see('Star Trek: First Contact was deleted.')
			 ->dontSee('More about Star Trek: First Contact');
	}
}
