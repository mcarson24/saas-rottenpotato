<?php

use App\Movie;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use Carbon\Carbon;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
	use Migrator;

	use DatabaseTransactions;

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
		$this->fillField('release_date', Carbon::parse($release_date));
		$this->pressButton('Add Movie');
		$this->assertPageAddress('movies');
		$this->assertPageContainsText($title);
	}

	/**
	 * @Then I create another new movie with a title of :arg1 a rating of :arg2 and a release date of :arg3
	 */
	public function iCreateAnotherNewMovieWithATitleOfARatingOfAndAReleaseDateOf($title, $rating, $release_date)
	{
		$this->iCreateANewMovieWithATitleOfARatingOfAndAReleaseDateOf($title, $rating, $release_date);
	}

	/**
	 * @Then /^"([^"]*)" should precede "([^"]*)" for the query "([^"]*)"$/
	 */
	public function shouldPrecedeForTheQuery($firstTitle, $secondTitle, $cssQuery)
	{
		$items = array_map(function ($matchingElement) {
				return $matchingElement->getText();
		}, $this->getSession()->getPage()->findAll('css', $cssQuery));

		PHPUnit_Framework_Assert::assertTrue(
			array_search($firstTitle, $items) <
			array_search($secondTitle, $items),
			"$firstTitle does not proceed $secondTitle"
		);
	}

	/**
	 * @Then I want movies with the following ratings :arg1
	 */
	public function iWantMoviesWithTheFollowingRatings($ratings)
	{
		$ratings = explode(',', $ratings);

		foreach ($ratings as $rating)
		{
			$this->checkOption($rating . '-check');
		}

		$this->pressButton('Filter');

		$this->assertPageAddress('movies?filter=R');
	}

	/**
	 * @Then I should see a movie with the rating :arg1
	 */
	public function iShouldSeeAMovieWithTheRating($rating)
	{
		$items = array_map(function($rating) {
			return $rating->getText();
		}, $this->getSession()->getPage()->findAll('css', 'td.rating'));

		PHPUnit_Framework_Assert::assertContains($rating, $items);
	}

	/**
	 * @Then I should not see a movie with the rating :arg1
	 */
	public function iShouldNotSeeAMovieWithTheRating($rating)
	{
		$items = array_map(function($rating) {
			return $rating->getText();
		}, $this->getSession()->getPage()->findAll('css', 'td.rating'));

		PHPUnit_Framework_Assert::assertNotContains($rating, $items);
	}
}
