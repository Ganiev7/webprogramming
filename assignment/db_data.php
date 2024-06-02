<?php
$db=mysqli_connect("localhost","root","") or die (mysqli_error($db));
mysqli_select_db($db,"mytable") or die(mysqli_error($db));
$query= 'INSERT INTO actors (actor_name,actor_city_id) VALUES
("Leonardo DiCaprio",1),
("Angelina Jolie",1),
("Brad Pitt",1),
("Will Smith",1),
("Robert De Niro",2),
("Natalie Portman",2),
("Scarlett Johansson",2),
("Robert Downey Jr",2),
("Benedict Cumberbatch",3),
("Hugh Grant",3),
("Daniel Day-Lewis",3),
("Emma Watson",3)';
mysqli_query($db,$query) or die(mysqli_error($db));

$query= 'INSERT INTO cities (city_name) VALUES
("Los Angeles"),
("New York"),
("London")';
mysqli_query($db,$query) or die(mysqli_error($db));
?>