let close = document.querySelector('.btnclose');
let alertElt = document.querySelector('.alert');

close.addEventListener("click", function() {
	alertElt.style.opacity = 0;
	setTimeout(function() {
		alertElt.style.display = "none";
	}, 600);
});