function validateForm() {
	var username = $("#username")[0];
	var password = $("#password")[0];
	var checkValid = [username, password];
	
	for (var i = 0; i < checkValid.length; i++) {
		var elem = checkValid[i];
		if (!elem.checkValidity()) {
			elem.style.backgroundColor = "red";
		} else {
			elem.style.backgroundColor = "white";
		}
	}
}
