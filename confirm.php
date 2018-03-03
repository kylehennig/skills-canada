<?php
	$name = "Event Name";
	$description = "Here we have a description of the event. This will provide further details as to what this purchase is actually for. Additionally, the price of each ticket should be listed here, as well as the time, tour location, and anything else the website owner wishes to add.";
	$date = "Jul 1, 2017 - Jul 24, 2017, 12:00 PM";
	
	$eventId = filter_input(INPUT_GET, "id");
	if (isset($eventId) && !empty($eventId)) {
		require_once("database.php");
		$event = getEventById($eventId);
		$name = $event["name"];
		$description = $event["description"];
		$date = $event["date"] . ", " . $event["time"];
	}
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Winnipeg Railway Museum</title>
	<link rel="stylesheet" type="text/css" href="index.css" />
	<link rel="stylesheet" type="text/css" href="confirm.css" />
</head>

<body>
	<?php
		require_once("header.php");
	?>
	<main>
		<section>
			<h1>Order Confirmed</h1>
			<h2><?php print $name; ?></h2>
			<p><?php print $description; ?></p>
			<p><?php print $date; ?></p>
		</section>
		<section>
			<h1>Total Cost</h1>
			<p>Subtotal: <span id="subtotal">$19.99</span></p>
			<p>Tax: <span id="tax">10%</span></p>
			<p>Total: <span id="total">$22.99</span></p>
		</section>
	</main>
	<div id="modal" class="hidden"></div>
	<script src="confirm.js"></script>
</body>


</html>
