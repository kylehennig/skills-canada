var events;
var pageNumber = 1;
var pageMax;

$(init);

function init() {
	$.post({
		url: "database.php",
		data: {
			"function": "getEvents",
		},
		success: function (data) {
			console.log(data);
			events = JSON.parse(data);
			createTable(1);
		},
		error: function (data) {
			
		}
	});
}

function createTable(page) {
	var table = $("#eventList");
	var t = "<tr>";
	t += "<td>Name</td>";
	t += "<td>Description</td>";
	t += "<td>Date</td>";
	t += "<td>Time</td>";
	t += "</tr>";
	var startIndex = (page - 1) *  5;
	var endIndex = Math.min(startIndex + 5, events.length);
	for (var i = startIndex; i < endIndex; i++) {
		var event = events[i];
		t += "<tr id='row" + event.eventId + "'>";
		t += "<td>";
		t += event.eventName;
		t += "</td>";
		t += "<td>";
		t += event.eventDesc;
		t += "</td>";
		t += "<td>";
		t += event.eventDate;
		t += "</td>";
		t += "<td>";
		t += event.eventTime;
		t += "</td>";
		// Buttons.
		t += "<td>";
		t += "<input type='button' value='Edit' onclick='editEvent(" + event.eventId + ")'; />";
		t += "</td>";
		t += "<td>";
		t += "<input type='button' value='Delete' onclick='deleteEvent(" + event.eventId + ")'; />";
		t += "</td>";
		t += "</tr>";
	}
	pageMax = Math.ceil(events.length / 5);
	t += "<tr><td>Page " + page + " of " + pageMax;
	table.html(t);
}

function newEvent() {
	var eventName = $("#eventName")[0].value;
	var eventDesc = $("#eventDesc")[0].value;
	var eventDate = $("#eventDate")[0].value;
	var eventTime = $("#eventTime")[0].value;
	var hour = eventTime.split(":")[0];
	var minute = eventTime.split(":")[1];
	console.log(hour + ":" + minute);
	
	$.post({
		url: "database.php",
		data: {
			"function": "newEvent",
			"eventName": eventName,
			"eventDesc": eventDesc,
			"eventDate": eventDate,
			"eventTime": eventTime
		},
		success: function (data) {
			console.log(data);
			var button = $("#newEvent")[0];
			button.value = "Success!";
			button.style.backgroundColor = "green";
			setTimeout(function () {
				// button.value = "Create Event";
				// button.style.backgroundColor = "#790c00";
				window.location = "editor.php";
			}, 3000);
		},
		error: function (data) {
			
		}
	});
}

function deleteEvent(id) {
	$.post({
		url: "database.php",
		data: {
			"function": "deleteEvent",
			"eventId": id
		},
		success: function (data) {
			console.log(data);
			console.log("Success!");
			window.location = "editor.php";
		},
		error: function (data) {
			
		}
	});
}

function editEvent(id) {
	for (var i = 0; i < events.length; i++) {
		if (parseInt(events[i].eventId) === id) {
			var event = events[i];
			break;
		}
	}
	$("#eventName")[0].value = event.eventName;
	$("#eventDesc")[0].value = event.eventDesc;
	$("#eventDate")[0].value = event.eventDate;
	$("#eventTime")[0].value = event.eventTime;
	var button = $("#newEvent")[0];
	button.value = "Update Event";
	button.onclick = function () {
		$.post({
			url: "database.php",
			data: {
				"function": "updateEvent",
				"eventId": id,
				"eventName": $("#eventName")[0].value,
				"eventDesc": $("#eventDesc")[0].value,
				"eventDate": $("#eventDate")[0].value,
				"eventTime": $("#eventTime")[0].value
			},
			success: function (data) {
				var button = $("#newEvent")[0];
				button.value = "Success!";
				button.style.backgroundColor = "green";
				setTimeout(function () {
					window.location = "editor.php";
				}, 3000);
			},
			error: function (data) {

			}
		});
	}
}

function previousPage() {
	if (pageNumber <= 1) {
		return;
	}
	pageNumber--;
	createTable(pageNumber);
}

function nextPage() {
	if (pageNumber >= pageMax) {
		return;
	}
	pageNumber++;
	createTable(pageNumber);
}

function search() {
	var searchText = $("#searchText")[0].value;
	var table = $("#eventList");
	var t = "<tr>";
	t += "<td>Name</td>";
	t += "<td>Description</td>";
	t += "<td>Date</td>";
	t += "<td>Time</td>";
	t += "</tr>";
	for (var i = 0; i < events.length; i++) {
		var event = events[i];
		if (event.eventName.toLowerCase().indexOf(searchText) === -1) {
			continue;
		}
		t += "<tr id='row" + event.eventId + "'>";
		t += "<td>";
		t += event.eventName;
		t += "</td>";
		t += "<td>";
		t += event.eventDesc;
		t += "</td>";
		t += "<td>";
		t += event.eventDate;
		t += "</td>";
		t += "<td>";
		t += event.eventTime;
		t += "</td>";
		// Buttons.
		t += "<td>";
		t += "<input type='button' value='Edit' onclick='editEvent(" + event.eventId + ")'; />";
		t += "</td>";
		t += "<td>";
		t += "<input type='button' value='Delete' onclick='deleteEvent(" + event.eventId + ")'; />";
		t += "</td>";
		t += "</tr>";
	}
	table.html(t);
	// Hide the page navigation buttons.
	$("#back").css({display: "none"});
	$("#next").css({display: "none"});
}