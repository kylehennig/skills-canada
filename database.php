<?php
	// Reusable database connector.
	function queryDatabase($sql, $args) {
		try {
			$conn = new PDO("mysql:host=localhost;dbname=museum;charset=utf8", "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Prevent SQL injection using prepared statements.
			$stmt = $conn->prepare($sql);
			if (sizeof($args) == 0) {
				$stmt->execute();
			} else {
				$stmt->execute($args);
			}
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOException $e) {
			print "Error: " . $e->getMessage();
		}
	}
	
	// -------------------------------------------------------------------------------------
	// AJAX Requests.
	// -------------------------------------------------------------------------------------
	
	// Handle AJAX requests received from other pages.
	$function = filter_input(INPUT_POST, "function");
	if ($function == "newEvent") {
		newEvent();
	} else if ($function == "getEvents") {
		getEvents();
	} else if ($function == "deleteEvent") {
		deleteEvent();
	} else if ($function == "updateEvent") {
		updateEvent();
	} else if ($function == "getTickets") {
		getTickets();
	}
	
	// Create a new event.
	function newEvent() {
		// Sanitize the information before storing it in the database.
		$eventName = htmlentities(filter_input(INPUT_POST, "eventName"));
		$eventDesc = htmlentities(filter_input(INPUT_POST, "eventDesc"));
		$eventDate = htmlentities(filter_input(INPUT_POST, "eventDate"));
		$eventTime = htmlentities(filter_input(INPUT_POST, "eventTime"));
		$sql = "INSERT INTO event (id, name, description, date, time) VALUES (NULL, ?, ?, ?, ?);";
		$result = queryDatabase($sql, array($eventName, $eventDesc, $eventDate, $eventTime));
	}
	
	// Get all of the events in the database in JSON format.
	function getEvents() {
		$sql = "SELECT * FROM event";
		$result = queryDatabase($sql, array());
		print "[";
		for ($i = 0; $i < sizeof($result); $i++) {
			$row = $result[$i];
			$eventId = $row["id"];
			$eventName = $row["name"];
			$eventDesc = $row["description"];
			$eventDate = $row["date"];
			$eventTime = $row["time"];
			print <<<JSON
{
	"eventId": "$eventId",
	"eventName": "$eventName",
	"eventDesc": "$eventDesc",
	"eventDate": "$eventDate",
	"eventTime": "$eventTime"
}
JSON;
			if ($i < sizeof($result) - 1) {
				print ",";
			}
		}
		print "]";
	}
	
	// Delete an event.
	function deleteEvent() {
		$eventId = htmlentities(filter_input(INPUT_POST, "eventId"));
		$sql = "DELETE FROM event WHERE id = ?;";
		$result = queryDatabase($sql, array($eventId));
	}
	
	// Update an event.
	function updateEvent() {
		// Sanitize the information before storing it in the database.
		$eventId = filter_input(INPUT_POST, "eventId");
		$eventName = htmlentities(filter_input(INPUT_POST, "eventName"));
		$eventDesc = htmlentities(filter_input(INPUT_POST, "eventDesc"));
		$eventDate = htmlentities(filter_input(INPUT_POST, "eventDate"));
		$eventTime = htmlentities(filter_input(INPUT_POST, "eventTime"));
		$sql = "UPDATE event SET name = ?, description = ?, date = ?, time = ? WHERE id = ?;";
		$result = queryDatabase($sql, array($eventName, $eventDesc, $eventDate, $eventTime, $eventId));
	}

	// Get a list of all tickets in JSON format.
	function getTickets() {
		$sql = "SELECT ticket.id, event.name as name, buyer, price FROM ticket INNER JOIN event ON ticket.event_id = event.id;";
		$result = queryDatabase($sql, array());
		print "[";
		for ($i = 0; $i < sizeof($result); $i++) {
			$row = $result[$i];
			$ticketId = $row["id"];
			$ticketEvent = $row["name"];
			$ticketBuyer = $row["buyer"];
			$ticketPrice = $row["price"];
			print <<<JSON
{
	"ticketId": "$ticketId",
	"ticketEvent": "$ticketEvent",
	"ticketBuyer": "$ticketBuyer",
	"ticketPrice": "$ticketPrice"
}
JSON;
			if ($i < sizeof($result) - 1) {
				print ",";
			}
		}
		print "]";
	}
	
	// -------------------------------------------------------------------------------------
	// PHP Requests.
	// -------------------------------------------------------------------------------------
	
	// Get the next 4 events from today as an array.
	function getUpcomingEvents() {
		$sql = "SELECT * FROM event WHERE date > CURRENT_DATE LIMIT 4;";
		$result = queryDatabase($sql, array());
		return $result;
	}
	
	// Get the next 4 events from today as an array.
	function getEventById($id) {
		$sql = "SELECT * FROM event WHERE id = ?;";
		$result = queryDatabase($sql, array($id));
		return $result[0];
	}
?>
