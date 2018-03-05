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
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/tickets.css" />
</head>

<body>
	<?php
		require_once("header.php");
	?>
	<main>
		<form id="ticketForm" action="confirm.php?id=<?php print $eventId; ?>" method="post">
			<section id="description">
				<h1>Buy Tickets</h1>
				<h2><?php print $name; ?></h2>
				<p><?php print $description; ?></p>
				<p><?php print $date; ?></p>
			</section>
			
			<section id="tickets">
				<h3>Purchase Details</h3>
				<label for="childTickets">Number of children:</label>
				<input type="number" id="childTickets" name="childTickets" min="0" max="99" value="0" required onchange="verifyPurchase()" />
				<label for="adultTickets">Number of adults:</label>
				<input type="number" id="adultTickets" name="adultTickets" min="0" max="99" value="0" required onchange="verifyPurchase()" />
				<label for="seniorTickets">Number of seniors:</label>
				<input type="number" id="seniorTickets" name="seniorTickets" min="0" max="99" value="0" required onchange="verifyPurchase()" />
				<p>Subtotal: $19.99</p>
			</section>
			
			<section id="contact">
				<h3>Contact Information</h3>
				<label for="street">Street:</label>
				<input type="text" id="street" name="street" required onchange="verifyPurchase()" />
				<label for="city">City:</label>
				<input type="text" id="city" name="city" required onchange="verifyPurchase()" />
				<label for="province">Province:</label>
				<input type="text" id="province" name="province" required onchange="verifyPurchase()" />
				<label for="postalCode">Postal Code:</label>
				<input type="text" id="postalCode" name="postalCode" required onchange="verifyPurchase()" />
			</section>
			
			<section id="billing">
				<h3>Billing Information</h3>
				<label for="streetBilling">Street:</label>
				<input type="text" id="streetBilling" name="streetBilling" required onchange="verifyPurchase()" />
				<label for="cityBilling">City:</label>
				<input type="text" id="cityBilling" name="cityBilling" required onchange="verifyPurchase()" />
				<label for="provinceBilling">Province:</label>
				<input type="text" id="provinceBilling" name="provinceBilling" required onchange="verifyPurchase()" />
				<label for="postalCodeBilling">Postal Code:</label>
				<input type="text" id="postalCodeBilling" name="postalCodeBilling" required onchange="verifyPurchase()" />
			</section>
			
			<section id="cardInfo">
				<h3>Credit or Debit Card</h3>		
				<label for="credit">Credit Card Number:</label>		
				<input type="text" id="credit" name="credit" required onchange="verifyPurchase()" />
				<label for="firstName">First Name:</label>		
				<input type="text" id="firstName" name="firstName" required onchange="verifyPurchase()" />
				<label for="lastName">Last Name:</label>		
				<input type="text" id="lastName" name="lastName" required onchange="verifyPurchase()" />
				<div>
					<label for="mailTicket">Mail a physical ticket for $5:</label>		
					<input type="checkbox" id="mailTicket" name="mailTicket" />
				</div>
				<input type="button" value="Purchase" onclick="verifyPurchase(true)" />
			</section>
		</form>
	</main>
	<div id="modal" class="hidden"></div>
	<script src="js/tickets.js"></script>
</body>

</html>
