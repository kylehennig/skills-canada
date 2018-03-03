$(init);

function init() {
	// Calculate the subtotal, tax, and total.
	var subtotal = $("#subtotal")[0];
	var tax = $("#tax")[0];
	var total = $("#total")[0];
	
	var subtotalVal = parseFloat(subtotal.innerHTML.toString().replace("$", ""));
	var taxVal = 0.1 * subtotalVal;
	var totalVal = subtotalVal + taxVal;
	
	// Truncate to two decimal places.
	tax.innerHTML = "$" + Math.round(taxVal * 100) / 100;
	total.innerHTML = "$" + Math.round(totalVal * 100) / 100;
}