Feature: Filter Movies
  As a concerned parent
  So that I more easily find movies that I can let my children watch
  I want to be able to filter movies by their ratings

Scenario: Filter out all movies except R-rated movies
#  Given I am on the homepage
#  Then I create a new movie with a title of "Deadpool" a rating of "R" and a release date of "02/12/2016"
#  Then I create another new movie with a title of "Bambi" a rating of "G" and a release date of "08/21/1942"
#  Then I want movies with the following ratings "R"
#  Then I should see a movie with the rating "R"
#  And I should not see a movie with the rating "G"

Scenario: Filter out all R-rated movies
  Given I am on the homepage
  Then I create a new movie with a title of "Deadpool" a rating of "R" and a release date of "02/12/2016"
  Then I create a new movie with a title of "The Hangover" a rating of "R" and a release date of "06/05/2009"
  Then I create a new movie with a title of "Saving Private Ryan" a rating of "R" and a release date of "07/24/1998"
  Then I create another new movie with a title of "Bambi" a rating of "G" and a release date of "08/21/1942"
  Then I create another new movie with a title of "Harry Potter and the Sorcerer's Stone" a rating of "PG" and a release date of "11/16/2001"
  Then I create another new movie with a title of "Star Wars: The Force Awakens" a rating of "PG-13" and a release date of "12/18/2015"
  Then I want movies with the following ratings "G,PG,PG-13"
  Then I should not see a movie with the rating "R"
  And I should see a movie with the rating "G"
  And I should see a movie with the rating "PG"
  And I should see a movie with the rating "PG-13"