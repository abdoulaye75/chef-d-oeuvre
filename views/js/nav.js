$(document).ready(function() {
	let myNavbar = $("#myNavbar");
	let icon = $("#hamburger_menu");
	let dropdown1 = $("#dropdown1");
	let dropdown2 = $("#dropdown2");
	let dropdownContent1 = $("#dropdown-content1");
	let dropdownContent2 = $("#dropdown-content2");

	icon.click(function() {
		myNavbar.toggle();
		myNavbar.toggleClass("responsive");
	});

	dropdown1.click(function() {
		dropdownContent1.toggle();
		dropdownContent1.toggleClass("show");
	});

	dropdown2.click(function() {
		dropdownContent2.toggle();
		dropdownContent2.toggleClass("show");
	});
});