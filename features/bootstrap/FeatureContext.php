<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\Migrator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
	use Migrator;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

	/**
	 * @Then I create a new movie with a title of :arg1 a rating of :arg2 and a release date of :arg3
	 */
	public function iCreateANewMovieWithATitleOfARatingOfAndAReleaseDateOf($title, $rating, $release_date)
	{
		$this->visit('movies/create');
		$this->fillField('title', $title);
		$this->selectOption('movie_rating', $rating);
		$this->fillField('release_date', $release_date);
		$this->pressButton('Add Movie');
		$this->assertPageAddress('movies');
	}

	/**
	 * @Then I create another new movie with a title of :arg1 a rating of :arg2 and a release date of :arg3
	 */
	public function iCreateAnotherNewMovieWithATitleOfARatingOfAndAReleaseDateOf($title, $rating, $release_date)
	{
		$this->iCreateANewMovieWithATitleOfARatingOfAndAReleaseDateOf($title, $rating, $release_date);
	}

	/**
	 * @Then I should see :arg1 before :arg2
	 */
	public function iShouldSeeBefore($first, $second)
	{
		$this->visit('movies');
		$this->assertElementContainsText('tr#movie_1 .title', $first);
		$this->assertElementContainsText('tr#movie_2 .title', $second);
	}

	/**
	 * @Then I should see the movies in this order :arg1 before :arg2 before :arg3
	 */
	public function iShouldSeeTheMoviesInThisOrderBeforeBefore($first, $second, $third)
	{
		$this->visit('movies');
		$this->assertElementContainsText('tr#movie_1 .title', $first);
		$this->assertElementContainsText('tr#movie_2 .title', $second);
		$this->assertElementContainsText('tr#movie_3 .title', $third);
	}
}
