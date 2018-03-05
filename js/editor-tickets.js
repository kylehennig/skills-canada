var tickets;

$(init);

function init() {
	$.post({
		url: "database.php",
		data: {
			"function": "getTickets",
		},
		success: function (data) {
			console.log(data);
			tickets = JSON.parse(data);
			createTable();
		},
		error: function (data) {
			
		}
	});
}

function createTable() {
	var table = $("#ticketList");
	var t = "<tr>";
	t += "<td id='eventHeader'>Event Name</td>";
	t += "<td id='buyerHeader'>Buyer</td>";
	t += "<td id='priceHeader'>Price</td>";
	t += "</tr>";
	for (var i = 0; i < tickets.length; i++) {
		var ticket = tickets[i];
		t += "<tr id='row" + ticket.ticketId + "'>";
		t += "<td>";
		t += ticket.ticketEvent;
		t += "</td>";
		t += "<td>";
		t += ticket.ticketBuyer;
		t += "</td>";
		t += "<td>";
		t += "$" + parseInt(ticket.ticketPrice) / 100;
		t += "</td>";
		
	}
	table.html(t);
	registerOnClicks()
}

function search() {
	var searchText = $("#searchText")[0].value;
	var table = $("#ticketList");
	var t = "<tr>";
	t += "<td id='eventHeader'>Event Name</td>";
	t += "<td id='buyerHeader'>Buyer</td>";
	t += "<td id='priceHeader'>Price</td>";
	t += "</tr>";
	for (var i = 0; i < tickets.length; i++) {
		var ticket = tickets[i];
		if (ticket.ticketBuyer.toLowerCase().indexOf(searchText) === -1) {
			continue;
		}
		t += "<tr id='row" + ticket.ticketId + "'>";
		t += "<td>";
		t += ticket.ticketEvent;
		t += "</td>";
		t += "<td>";
		t += ticket.ticketBuyer;
		t += "</td>";
		t += "<td>";
		t += "$" + parseInt(ticket.ticketPrice) / 100;
		t += "</td>";
	}
	table.html(t);
	registerOnClicks()
}

function sortTable(comparator) {
	var ticketsCopy = [];
	for (var i = 0; i < tickets.length; i++) {
		ticketsCopy.push(tickets[i]);
	}
	ticketsCopy.sort(comparator);
	var table = $("#ticketList");
	var t = "<tr>";
	t += "<td id='eventHeader'>Event Name</td>";
	t += "<td id='buyerHeader'>Buyer</td>";
	t += "<td id='priceHeader'>Price</td>";
	t += "</tr>";
	for (var i = 0; i < ticketsCopy.length; i++) {
		var ticket = ticketsCopy[i];
		t += "<tr id='row" + ticket.ticketId + "'>";
		t += "<td>";
		t += ticket.ticketEvent;
		t += "</td>";
		t += "<td>";
		t += ticket.ticketBuyer;
		t += "</td>";
		t += "<td>";
		t += "$" + parseInt(ticket.ticketPrice) / 100;
		t += "</td>";
	}
	table.html(t);
	registerOnClicks()
}

function registerOnClicks() {
	$("#eventHeader").click(function() {
		sortTable(function (event1, event2) {
			return event1.ticketEvent.localeCompare(event2.ticketEvent);
		});
	});
	$("#buyerHeader").click(function() {
		sortTable(function (event1, event2) {
			return event1.ticketBuyer.localeCompare(event2.ticketBuyer);
		});
	});
	$("#priceHeader").click(function() {
		sortTable(function (event1, event2) {
			return event1.ticketPrice - event2.ticketPrice;
		});
	});
}