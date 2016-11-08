Feature: Sort Movies
  As a big movie buff
  So that I can more easily find the movies that I am looking for
  I want to be able to sort movies by their title and release date

Scenario: Sort movies by title
  Given I am on the homepage
  Then I create a new movie with a title of "The Adventures of Robin Hood" a rating of "PG" and a release date of "05/13/1938"
  Then I create another new movie with a title of "Catch Me If You Can" a rating of "PG-13" and a release date of "12/25/2002"
  Then I create another new movie with a title of "The Count of Monte Cristo" a rating of "PG-13" and a release date of "01/22/2002"
  Then I should be on "movies"
  Then I follow "Movie Title"
  Then I should see the movies in this order "The Adventures of Robin Hood" before "Catch Me If You Can" before "The Count of Monte Cristo"

  Scenario: Sort movies by release date
    Given I am on the homepage
    Then I create a new movie with a title of "The Adventures of Robin Hood" a rating of "PG" and a release date of "05/13/1938"
    Then I create another new movie with a title of "Catch Me If You Can" a rating of "PG-13" and a release date of "12/25/2002"
    Then I should be on "movies"
    Then I follow "Release Date"
    Then I should see "The Adventures of Robin Hood" before "Catch Me If You Can"
