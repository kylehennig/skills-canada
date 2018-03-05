// Id for list elements.
var listId = 0;

$(init);

function init() {
	var calendar = document.getElementById("calendar");
	var t = "";
	for (var row = 0; row < 6; row++) {
		t += "<tr>";
		for (var col = 0; col < 7; col++) {
			var num = row * 6 + col - 5;
			var numString = num.toString();
			if (numString.length < 2) {
				numString = "0" + numString;
			}
			t += "<td id=cell" + numString + ">";
			if (num > 0 && num < 32) {
				t += num;
			} else {
				t += " ";
			}
			t += "</td>";
		}
		t += "</tr>";
	}
	calendar.innerHTML = t;


	addEvent(new Date("2017-07-07T12:00:00"), "Event Name", "This is a brief description...");
	addEvent(new Date("2017-07-12T12:00:00"), "Event Name 2", "This is a brief description... 2");
	addEvent(new Date("2017-07-14T12:00:00"), "Event Name 3", "This is a brief description... 3");
	addEvent(new Date("2017-07-28T12:00:00"), "Event Name 4", "This is a brief description... 4");

	function addEvent(eventDate, eventName, eventDesc) {
		var numString = eventDate.toString().substring(8, 10);
		elem = $("#cell" + numString)[0];
		var html = "<div>";
		html += "<input type='button' value='" + eventName + "' />";
		html += "</div>";
		elem.innerHTML += html;
		// Create the modal popup.
		createModal(elem, eventDate, eventName, eventDesc);
		// List the event.
		listEvent(elem, eventDate, eventName, eventDesc);
	}

	// Create a modal popup for the given element.
	function createModal(elem, eventDate, eventName, eventDesc) {
		elem.onclick = function () {
			var modal = $("#modal")[0];
			modal.style.display = "block";
			modal.onclick = function () {
				modal.style.display = "none";
			}
			var html = "<div id='modal-content'>";
			html += "<h3>";
			html += eventName;
			html += "</h3>";
			html += "<p>";
			html += eventDesc;
			html += "</p>";
			html += "<a href='tickets.php'>";
			html += "Buy now!";
			html += "</a>";
			html += "</div>";
			modal.innerHTML = html;
		}
	}
	
	function listEvent(elem, eventDate, eventName, eventDesc) {
		listId++;
		var html = "<h3 id='event" + listId + "' onclick='eventDetails(" + listId + ")'>";
		html += eventDate.toString().substring(0, 15);
		html += "</h3>";
		html += "<div class='hidden'>";
		html += "<p>";
		html += eventName;
		html += "</p>";
		html += "<p>";
		html += eventDesc;
		html += "</p>";
		html += "<a href='tickets.php'>";
		html += "Buy now!";
		html += "</a>";
		html += "</div>";
		$("#list")[0].innerHTML += html;
	}
}

function eventDetails(listId) {
	var elem = $("#event" + listId);
	elem.next().toggle("hidden");
}
