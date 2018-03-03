<?php
	require_once("database.php");
	$events = getUpcomingEvents();
	// Prevent the website from breaking if the admin does not have least leave 4 events coming up.
	if (sizeof($events < 4)) {
		$events = array(
			"0" => array("id" => "53", "name" => "Event Name (3)", "description" => "This is a brief description... (3)", "date" => "2017-06-03", "time" => "14:00"),
			"1" => array("id" => "54", "name" => "Event Name (4)", "description" => "This is a brief description... (4)", "date" => "2017-06-04", "time" => "15:00"),
			"2" => array("id" => "55", "name" => "Event Name (5)", "description" => "This is a brief description... (5)", "date" => "2017-06-05", "time" => "16:00"),
			"3" => array("id" => "56", "name" => "Event Name (6)", "description" => "This is a brief description... (6)", "date" => "2017-06-06", "time" => "17:00")
		);
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Winnipeg Railway Museum</title>
	<link rel="stylesheet" type="text/css" href="index.css" />
</head>

<body>
	<?php
		require_once("header.php");
	?>
	<main>
		<section id="events">
			<div class="event" onclick="window.location = 'tickets.php?id=<?php print $events[0]["id"]; ?>'">
				<img src="img/events/train.jpg" />
				<div class="text">
					<h3><?php print $events[0]["name"]; ?></h3>
					<p><?php print $events[0]["description"]; ?></p>
					<p><?php print $events[0]["date"] . ", " . $events[0]["time"]; ?></p>
				</div>
			</div>
			<div class="event" onclick="window.location = 'tickets.php?id=<?php print $events[1]["id"]; ?>'">
				<img src="img/events/station.jpg" />
				<div class="text">
					<h3><?php print $events[1]["name"]; ?></h3>
					<p><?php print $events[1]["description"]; ?></p>
					<p><?php print $events[1]["date"] . ", " . $events[1]["time"]; ?></p>
				</div>
			</div>
			<div class="column">
				<div class="event" onclick="window.location = 'tickets.php?id=<?php print $events[2]["id"]; ?>'">
					<img src="img/events/caboose.jpg" />
					<div class="text">
						<h3><?php print $events[2]["name"]; ?></h3>
						<p><?php print $events[2]["description"]; ?></p>
						<p><?php print $events[2]["date"] . ", " . $events[2]["time"]; ?></p>
					</div>
				</div>
				<div class="event" onclick="window.location = 'tickets.php?id=<?php print $events[3]["id"]; ?>'">
					<img src="img/events/train-side.png" />
					<div class="text">
						<h3><?php print $events[3]["name"]; ?></h3>
						<p><?php print $events[3]["description"]; ?></p>
						<p><?php print $events[3]["date"] . ", " . $events[3]["time"]; ?></p>
					</div>
				</div>
			</div>
		</section>
		<section id="visit">
			<a href="events.php" class="option">
					<img src="img/ticket-icon.svg" alt="Tickets" />
					<p>Buy Tickets</p>
			</a>
			<div class="option">
				<img src="img/person-icon.svg" alt="Tickets" />
				<p>Membership</p>
			</div>
			<div class="option">
				<img src="img/donate-icon.svg" alt="Tickets" />
				<p>Donate</p>
			</div>
			<div class="option option-wide">
				<h3>WE ARE OPEN</h3>
				<p>9:30 AM - 5:00 PM</p>
				<p>See All Hours...</p>
			</div>
			<a href="events.php" class="option option-wide option-green">
				<p>Plan Your Visit</p>
			</a>
		</section>
	</main>
	<footer>
	</footer>
</body>

</html>
