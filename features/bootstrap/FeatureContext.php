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
		Movie::create([
			'title' => $title,
			'rating' => $rating,
			'release_date' => Carbon::parse($release_date)
		]);
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
		$this->assertElementContainsText('tr#movie_1 > .title', $first);
		$this->assertElementContainsText('tr#movie_2 > .title', $second);
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
}
