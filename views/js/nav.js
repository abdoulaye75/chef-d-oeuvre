let myNavbar = $("#myNavbar");
let icon = $("#hamburger_menu");

icon.click(function() {
	myNavbar.toggle();
	myNavbar.toggleClass("responsive");
});