<!--TASK 1-->
<?php
$db = mysqli_connect("localhost", "root", "") or die(mysqli_error($db));
mysqli_select_db($db, "myfirstdb") or die(mysqli_error($db));

$query = 'SELECT
    movie_name, movie_year
    FROM movie LEFT JOIN movietype ON movie.movie_type = movietype.movietype_id 
    WHERE movie.movie_type="5"
    ORDER BY movie_name';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result)) {
        extract ($row);
        echo $movie_name. ' - '. $movie_year.'<br/>';
}
?>

