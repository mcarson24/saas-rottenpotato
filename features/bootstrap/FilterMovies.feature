Feature: Filter movies
  As an avid movie watcher
  So that I can more easily find appropriate movies to watch
  I want to be able to filter movies by their ratings

Scenario: Show only 'G' rated movies
  Given I am on the homepage
  Then I create a new movie with a title of "The Count of Monte Cristo" a rating of "PG-13" and a release date of "01/22/2002"
  Then I create another new movie with a title of "Halloweentown" a rating of "PG" and a release date of "01/11/1998"
  Then I check G
  Then I press "refresh"
  Then I should see text matching "Halloweentown"
  Then I should not see text matching "The Count of Monte Cristo"