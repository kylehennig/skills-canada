<?php
	session_start();
	$authorized = $_SESSION["authorized"];
	if (!$authorized) {
		print("You are not authorized to use this page.");
		die();
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Winnipeg Railway Museum</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/editor-tickets.css" />
</head>

<body>
	<?php
		require_once("header-admin.php");
	?>
	<main>
		<section>
			<input type="search" id="searchText" placeholder="Ticket buyer..." />
			<input type="button" id="searchButton" value="Search" onclick="search()" />
			<table id="ticketList"></table>
		</section>
	</main>
	<script src="js/editor-tickets.js"></script>
</body>

</html>
