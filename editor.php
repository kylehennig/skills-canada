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
	<link rel="stylesheet" type="text/css" href="css/editor.css" />
</head>

<body>
	<?php
		require_once("header-admin.php");
	?>
	<main>
		<section id="create">
			<label for="eventName">Event Name:</label>
			<input type="text" id="eventName" name="eventName" required />
			<label for="eventDesc">Event Description:</label>
			<input type="text" id="eventDesc" name="eventDesc" required />
			<label for="eventDate">Event Date:</label>
			<input type="date" id="eventDate" name="eventDate" required />
			<label for="eventTime">Event Time:</label>
			<input type="time" id="eventTime" name="eventTime" required />
			
			<input id="newEvent" type="button" value="Create Event" onclick="newEvent();" />
		</section>
		<section>
			<input type="search" id="searchText" placeholder="Event name..." />
			<input type="button" id="searchButton" value="Search" onclick="search()" />
			<table id="eventList"></table>
			<input id="back" type="button" value="Previous Page" onclick="previousPage();" />
			<input id="next" type="button" value="Next Page" onclick="nextPage();" />
		</section>
	</main>
	<script src="js/editor.js"></script>
</body>

</html>
