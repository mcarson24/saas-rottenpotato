Feature: Sort Movies
  As a big movie buff
  So that I can more easily find the movies that I am looking for
  I want to be able to sort movies by their title and release date

Scenario: Sort movies by title
  Given I am on the homepage
  Then I create a new movie with a title of "The Count of Monte Cristo" a rating of "PG-13" and a release date of "01/22/2002"
  Then I create another new movie with a title of "Catch Me If You Can" a rating of "PG-13" and a release date of "12/25/2002"
  Then I create another new movie with a title of "The Adventures of Robin Hood" a rating of "PG" and a release date of "05/13/1938"
  Then "The Count of Monte Cristo" should precede "Catch Me If You Can" for the query "table#movies tr.movie td.movie-title:first-child"
  Then "Catch Me If You Can" should precede "The Adventures of Robin Hood" for the query "table#movies tr.movie td.movie-title:first-child"
  Then I am on "movies?sort=title"
  Then "Catch Me If You Can" should precede "The Adventures of Robin Hood" for the query "table#movies tr.movie td.movie-title:first-child"
  Then "The Adventures of Robin Hood" should precede "The Count of Monte Cristo" for the query "table#movies tr.movie td.movie-title:first-child"

Scenario: Sort movies by release date
  Given I am on the homepage
  Then I create a new movie with a title of "Catch Me If You Can" a rating of "PG-13" and a release date of "12/25/2002"
  Then I create a new movie with a title of "The Count of Monte Cristo" a rating of "PG-13" and a release date of "01/22/2002"
  Then I create another new movie with a title of "The Adventures of Robin Hood" a rating of "PG" and a release date of "05/13/1938"
  Then I am on "movies?sort=release_date"
  Then "The Adventures of Robin Hood" should precede "The Count of Monte Cristo" for the query "table#movies tr.movie td.movie-title"
  Then "The Count of Monte Cristo" should precede "Catch Me If You Can" for the query "table#movies tr.movie td.movie-title:first-child"

Scenario: Reverse the order of the movies sorted by title
  Given I am on the homepage
  Then I create a new movie with a title of "Star Wars: Episode V - The Empire Strikes Back" a rating of "PG" and a release date of "06/20/1980"
  Then I create another new movie with a title of "Star Wars: Episode IV - A New Hope" a rating of "PG" and a release date of "05/25/1977"
  Then I follow "Movie Title"
  Then I follow "Movie Title"
  Then "Star Wars: Episode IV - A New Hope" should precede "Star Wars: Episode V - The Empire Strikes Back" for the query "table#movies tr.movie td.movie-title"
  Then I follow "Movie Title"
  Then "Star Wars: Episode V - The Empire Strikes Back" should precede "Star Wars: Episode IV - A New Hope" for the query "table#movies tr.movie td.movie-title:first-child"

Scenario: Reverse the order of the movies sorted by release date
  Given I am on the homepage
  Then I create a new movie with a title of "Star Wars: Episode V - The Empire Strikes Back" a rating of "PG" and a release date of "06/20/1980"
  Then I create another new movie with a title of "Star Wars: Episode IV - A New Hope" a rating of "PG" and a release date of "05/25/1977"
  Then I follow "Release Date"
  Then I follow "Release Date"
  Then "Star Wars: Episode IV - A New Hope" should precede "Star Wars: Episode V - The Empire Strikes Back" for the query "table#movies tr.movie td.movie-title"
  Then I follow "Release Date"
  Then "Star Wars: Episode V - The Empire Strikes Back" should precede "Star Wars: Episode IV - A New Hope" for the query "table#movies tr.movie td.movie-title:first-child"
