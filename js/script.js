const body = document.querySelector('body');

body.addEventListener('click', function(event) {
	if (event.target.matches('[rel="toggle"]') ) {
		body.classList.toggle('menu-open');
	}
});