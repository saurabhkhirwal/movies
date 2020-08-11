<!DOCTYPE html>
<html>
<head>
	<title>Movie Manager</title>
	<style type="text/css">
		body, h3 {
			padding: 0;
			margin: 0;
			font-family: sans-serif;
		}
		button:hover {
			cursor: pointer;
		}
		#myMovies {
			padding-top: 20px;
			padding-left: 20px;
		}
		.popup_button {
			margin-top: 20px;
			margin-left: 20px;
			color: #ffffff;
    		background-color: #008cba;
    		padding: 5px 10px;
    		border: 0px;
    		outline: none;
		}
		.movie {
			width: 200px;
			height: 300px;
			text-align: center;
			float: left;
			margin-right: 30px;
			margin-bottom: 30px;
			font-size: 14px;
		}
		.movie img {
			max-width: 100%;
			max-height: 260px;
		}
		.movie button {
			margin-top: 5px;
		}
		#popup_wrapper {
			display: none;
			position: fixed;
			z-index: 99999;
			width: 100%;
			height: 100%;
			background-color: rgba(0,0,0,0.7);
		}
		.imdb_form {
			background: #ffffff;
			width: 400px;
			margin: 150px auto;
			padding: 20px;
		}
	</style>
</head>
<body>
	<div id="popup_wrapper" >
		<div class="imdb_form" >
			<h3>Add Movie</h3>
			<input type="text" name="imdb_id" id="imdb_id" />
			<button class="popup_button" onclick="addMovie();" >Add Movie</button>
		</div>
	</div>
	<button class="popup_button" onclick="$('#popup_wrapper').show();" >Add Movie</button>
	<div id="myMovies" ></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(() => {
			loadMovies();
		});
 
		function loadMovies() {
			$.get("data_handler.php").done((data) => {
				$("#myMovies").html(data);
			});
		};
 
		function increaseWatchTime(id) {
			$.post( "data_handler.php", { movieId: id }).done(function(data) {
				$("#myMovies").html(data);
			});
		};
	</script>
</body>
</html>