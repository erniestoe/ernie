function toggleMobileMenu() {
	const toggleButton = document.querySelector('.mobile-menu-toggle');
	const mobileMenu = document.querySelector('#mobileMenu');
	const masthead = document.querySelector('.masthead');

	toggleButton.addEventListener('click', () => {
		const isOpen = toggleButton.getAttribute('aria-expanded') === 'true';

		toggleButton.setAttribute('aria-expanded', !isOpen);
		mobileMenu.classList.toggle('visually-hidden');

		if(!mobileMenu.classList.contains('visually-hidden')) {
			toggleButton.innerHTML = 'x';
			mobileMenu.classList.add('blue');
			masthead.classList.add('blue');
			toggleButton.classList.add('blue');
		} else {
			toggleButton.innerHTML = '☰';
			mobileMenu.classList.remove('blue');
			masthead.classList.remove('blue');
			toggleButton.classList.remove('blue');
		}
	})
}

toggleMobileMenu();