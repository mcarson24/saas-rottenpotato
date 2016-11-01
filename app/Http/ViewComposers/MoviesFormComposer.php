<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class MoviesFormComposer
{
	/**
	 * The possible movie ratings.
	 *
	 * @var ratings
	 */
	protected $ratings = ['G', 'PG', 'PG-13', 'R', 'NC-17'];

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('ratings', $this->ratings);
	}
}