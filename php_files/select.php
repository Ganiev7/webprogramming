<?php
$db = mysqli_connect("localhost","root","") or
    die ("Unsble to connect". mysqli_connect_error());
mysqli_select_db($db,"myfirstdb") or die (mysqli_error($db));

$query = 'SELECT 
    movie_name, movie_type
    from movie
    where movie_year >1990
    order by movie_type';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_array($result)) {
    extract($row);
    echo $movie_name. ' - '. $movie_type .'<br/>';
}
?>