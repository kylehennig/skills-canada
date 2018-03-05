<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Winnipeg Railway Museum</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/events.css" />
</head>

<body>
	<?php
		require_once("header.php");
	?>
	<main>
		<section id="calendarSection">
			<input type="button" value="Grid" />
			<input type="button" value="List" />
			<h2>Jul 2017</h2>
			<table id="calendar"></table>
		</section>
		<section>
			<h2>Jul 2017</h2>
			<div id="list"></div>
		</section>
	</main>
	<div id="modal" class="hidden"></div>
	<script src="js/events.js"></script>
</body>

</html>
