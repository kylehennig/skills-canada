// Validate the form using jQuery.
function verifyPurchase(submitting) {
	var errors = [];
	
	var childTickets = $("#childTickets")[0];
	var adultTickets = $("#adultTickets")[0];
	var seniorTickets = $("#seniorTickets")[0];
	
	var street = $("#street")[0];
	var city = $("#city")[0];
	var province = $("#province")[0];
	var postalCode = $("#postalCode")[0];
	
	var streetBilling = $("#streetBilling")[0];
	var cityBilling = $("#cityBilling")[0];
	var provinceBilling = $("#provinceBilling")[0];
	var postalCodeBilling = $("#postalCodeBilling")[0];
	
	var credit = $("#credit")[0];
	var firstName = $("#firstName")[0];
	var lastName = $("#lastName")[0];
	var mailTicket = $("#mailTicket")[0];
	
	var checkValid = [
		childTickets, adultTickets, seniorTickets,
		street, city, province, postalCode,
		streetBilling, cityBilling, provinceBilling, postalCodeBilling,
		credit,	firstName, lastName, mailTicket
	];
	for (var i = 0; i < checkValid.length; i++) {
		var elem = checkValid[i];
		if (!elem.checkValidity()) {
			elem.style.backgroundColor = "red";
			errors.push(elem);
		} else {
			elem.style.backgroundColor = "white";
		}
	}
	
	// To be performed when the purchase button is clicked only.
	if (submitting) {
		if (errors.length === 0) {
			$("#ticketForm")[0].submit();
		} else {
			showModal("There are " + errors.length + " errors on this page.")
		}
	}
}

// Show a popup message to the user.
function showModal(message) {
		var modal = $("#modal")[0];
		modal.style.display = "block";
		modal.onclick = function () {
			modal.style.display = "none";
		}
		var html = "<div id='modal-content'>";
		html += "<h3>";
		html += "Please fix the parts of this form highlighted in red.";
		html += "</h3>";
		html += "<p>";
		html += message;
		html += "</p>";
		html += "</div>";
		modal.innerHTML = html;
}