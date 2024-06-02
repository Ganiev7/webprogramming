<?php
$db = mysqli_connect('localhost', 'root', '') or die('unable to connect');

$query = 'CREATE DATABASE IF NOT EXISTS myfirstdb';
mysqli_query($db, $query) or die(mysqli_error($db));
mysqli_select_db($db, 'myfirstdb');

$query = 'CREATE TABLE movie (
    movie_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    movie_name VARCHAR(255) NOT NULL,
    movie_type TINYINT NOT NULL DEFAULT 0,
    movie_year SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    movie_leadactor INTEGER UNSIGNED NOT NULL DEFAULT 0,
    movie_director INTEGER UNSIGNED NOT NULL DEFAULT 0,
    primary key (movie_id),
    key movie_type (movie_type, movie_year)
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE movietype (
    movietype_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    movietype_label VARCHAR(100) NOT NULL,
    PRIMARY KEY (movietype_id)
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE people (
    people_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    people_fullname VARCHAR(255) NOT NULL,
    people_isactor TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    people_isdirector TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    PRIMARY KEY (people_id)
) ENGINE=MyISAM';
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Movie database created';
?>
