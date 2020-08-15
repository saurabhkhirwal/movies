<?php
	// Assuming sql below to create database "db_name" 
	// Creating table named "movies" in the database
	// Adding two sample rows to the table
	/*
		CREATE DATABASE IF NOT EXISTS `db_name` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
		USE `db_name`;

		CREATE TABLE `db_name`.`movies` ( 
			`id` INT(11) NOT NULL AUTO_INCREMENT , 
			`imdbid` VARCHAR(20) NOT NULL , 
			`name` VARCHAR(50) NOT NULL , 
			`year` INT(4) NOT NULL , 
			PRIMARY KEY (`id`)
		) ENGINE = InnoDB;

		INSERT INTO `db_name`.`movies` (`id`, `imdbid`, `name`, `year`) VALUES 
			(NULL, 'tt123456', 'Movie A', '1999'), 
			(NULL, 'tt524363', 'New Movie', '2015');
	*/

	// Set database connection variable
	$hostname = "localhost"; // usually "localhost" for local server
	$username = "root"; // usually "root" for local server
	$password = ""; // usually "" for local server
	$database = "db_name"; // name of your mysql database

	// connect to mysql server
	$mysqli = new mysqli($hostname, $username, $password, $database);

	// execute your mysql query
	$result = $mysqli->query("SELECT * FROM `movies`;");

	// get number of rows returned for the query
	$number_of_rows = mysqli_num_rows($result);

	// if rows are more than 0
	if($number_of_rows > 0) {
		// for each movie row found by the query
		while ($movie = $result->fetch_assoc()) {
			// the movies table contains the columns imdbid, name and year
			echo "Id : " . $movie['id'] . "<br />";
			echo "Movie ImdbId : " . $movie['imdbid'] . "<br />";
			echo "Movie Name : " . $movie['name'] . "<br />";
			echo "Movie Year : " . $movie['year'] . "<br />";
			echo "<hr />";
		}
	}
?>
