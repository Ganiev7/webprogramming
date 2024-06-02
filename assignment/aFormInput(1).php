<?php
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect');

$query = 'CREATE DATABASE IF NOT EXISTS myfirstdb';
mysqli_query($db, $query) or die(mysqli_error($db));
mysqli_select_db($db, 'myfirstdb');

$query = 'CREATE TABLE IF NOT EXISTS mytable (
    s_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    s_name VARCHAR(50) NOT NULL,
    city_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (s_id)
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];

    $query = "INSERT INTO mytable (s_name, city_name) VALUES ('$name', '$city')";
    mysqli_query($db, $query) or die(mysqli_error($db));

    echo 'Data inserted successfully.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Entry</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: white;
        }
    </style>
</head>
<body>
    <h2>User Data Entry</h2>
    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="city">City:</label><br>
        <select id="city" name="city" required>
            <option value="" disabled selected>Select your city</option>
            <option value="Seoul">Seoul</option>
            <option value="Busan">Busan</option>
            <option value="Daegu">Daegu</option>
            <option value="Incheon">Incheon</option>
            <option value="Suwon">Suwon</option>
            <option value="Osan">Osan</option>
            <option value="Ansan">Ansan</option>
            <option value="Daejeon">Daejeon</option>
            <option value="Ulsan">Ulsan</option>
            <option value="Seosan">Seosan</option>
            <option value="Sejong">Sejong</option>
        </select><br><br>

        <label for="name">Gender</label><br>
        <input type="radio" name="gender" value="Male">Male<br>
        <input type="radio" name="gender" value="Female">Female<br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Retrieve Data from the "myfirstdb" Database</h2>
    <form method="post" action="">
        <label for="selected_city">Select a city:</label>
        <select id="selected_city" name="selected_city">
            <option value="" disabled selected>Select a city</option>
            <option value="Seoul">Seoul</option>
            <option value="Busan">Busan</option>
            <option value="Daegu">Daegu</option>
            <option value="Incheon">Incheon</option>
            <option value="Suwon">Suwon</option>
            <option value="Osan">Osan</option>
            <option value="Ansan">Ansan</option>
            <option value="Daejeon">Daejeon</option>
            <option value="Ulsan">Ulsan</option>
            <option value="Seosan">Seosan</option>
            <option value="Sejong">Sejong</option>
        </select>
        <input type="submit" name="retrieve" value="Show">
    </form>

    <?php
    if (isset($_POST['retrieve']) && isset($_POST['selected_city'])) {
        $selected_city = $_POST['selected_city'];

        $query = "SELECT s_id, s_name, city_name FROM mytable WHERE city_name = '$selected_city' ORDER BY s_id";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        echo "<h3>User Data for $selected_city</h3>";
        echo "<table border='1'>";
        echo "<tr><th>SID</th><th>Name</th><th>City</th></tr>";
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row["s_id"] . "</td><td>" . $row["s_name"] . "</td><td>" . $row["city_name"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data available</td></tr>";
        }
        echo "</table>";

        $db->close();
    }
    ?>
</body>
</html>
