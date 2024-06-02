<?php
// Establish database connection
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect');

// Create or select database
$query = 'CREATE DATABASE IF NOT EXISTS mytable';
mysqli_query($db, $query) or die(mysqli_error($db));
mysqli_select_db($db, 'mytable');

// Create tables if not exist
$query = 'CREATE TABLE IF NOT EXISTS S_ID (
    s_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (s_id)
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE IF NOT EXISTS S_Cities (
    city_name VARCHAR(50) NOT NULL,
    s_id INTEGER UNSIGNED NOT NULL, -- Add s_id column here
    PRIMARY KEY (city_name),
    FOREIGN KEY (s_id) REFERENCES S_ID(s_id) -- Add foreign key constraint
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE IF NOT EXISTS S_Name (
    s_name VARCHAR(50) NOT NULL
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

// Process form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];

    // Insert data into the S_Name table
    $query = "INSERT INTO S_Name (s_name) VALUES ('$name')";
    mysqli_query($db, $query) or die(mysqli_error($db));

    // Insert data into the S_Cities table
    $query = "INSERT INTO S_Cities (city_name) VALUES ('$city')";
    mysqli_query($db, $query) or die(mysqli_error($db));

    echo 'Data inserted successfully.';
}
?>