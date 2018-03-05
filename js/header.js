$(init);

function init() {
	// Show menu when menu button is pressed.
	$("header #menu").click(function () {
		$("header ul").toggle("hidden");
	});
	
	// Hide search bar on mobile devices.
	if (window.innerWidth <= 768) {
		// Show search bar when search button is pressed.
		$("header #search img").click(function () {
			$("header #search input").toggle("hidden");
			$("header #logo").toggle("hidden");
		});
	}
}