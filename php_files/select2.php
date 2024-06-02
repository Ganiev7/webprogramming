<?php
$db= mysqli_connect("localhost","root","") or die("unable to connect");
mysqli_select_db($db,'myfirstdb') or die(mysqli_error($db));

$query = 'SELECT
movie.movie_name, movietype.movietype_label
FROM
    movie, movietype
WHERE
    movie.movie_type = movietype.movietype_id AND
    movie_year> 1990
ORDER BY
    movie_type';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>'. $value . '</td>';
    }
    echo '</tr>';
}
echo'</table>';
?>
