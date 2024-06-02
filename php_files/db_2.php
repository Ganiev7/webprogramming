<?php
$db=mysqli_connect("localhost","root","") or die (mysqli_error($db));
mysqli_select_db($db,"myfirstdb") or die(mysqli_error($db));
$query= 'INSERT INTO movie
(movie_id, movie_name, movie_type, movie_year, movie_leadactor, movie_director)
VALUES 
(1, "Bruce Almighty", 5, 2003, 1,2),
(2, "Office Space", 5, 1999, 5, 6),
(3, "Drand Canyon", 2, 1991, 4, 3)';
mysqli_query($db, $query) or die (mysqli_error($db));

$query= 'INSERT INTO movietype
(movietype_id, movietype_label)
values
(1,"Sci-fi"),
(2,"Drama"),
(3,"Advanture"),
(4,"War"),
(5,"Comedy"),
(6,"Horror"),
(7,"Action"),
(8,"Kids")';
mysqli_query($db, $query) or die (mysqli_error($db));

$query= 'INSERT INTO people
(people_id,people_fullname,people_isactor,people_isdirector)
values
(1,"Jim Carrey",1,0),
(2,"Tom Shadyac",0,1),
(3,"Lawrence Kasdan",0,1),
(4,"Kevin Kline",1,0),
(5,"Ron Livingston",1,0),
(6,"Mike Judge",0,1)';
mysqli_query($db, $query) or die (mysqli_error($db));
echo 'Data inserted';
?>