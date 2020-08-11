<?php
	$fileContents = file_get_contents("db.json");
	$json = json_decode($fileContents, true);
 
	if(isset($_POST["movieId"])) {
		$json['movies'][$_POST["movieId"]]["noOfTimesWatched"] += 1;
		$json['movies'][$_POST["movieId"]]["lastWatched"] = time();
		file_put_contents("db.json", json_encode($json, JSON_PRETTY_PRINT));
	}
 
	$movies = $json['movies'];
 
	foreach ($movies as $id => $movie) {
?>
		<div class="movie" id="movie_<?php echo $movie["id"]; ?>" >
			<a href="<?php echo $movie["details"]; ?>" target="_blank"><img src="<?php echo $movie["poster"]; ?>" /></a><br />
			<b><?php echo $movie["movieName"]; ?></b><br />
			Watched: <?php echo $movie["noOfTimesWatched"]; ?><br />
			Last Seen: <?php echo date("d-m-Y", $movie["lastWatched"]); ?><br />
			<button onclick="increaseWatchTime('<?php echo $id; ?>');" >Watched Today</button>
		</div>
<?php
	}
?>