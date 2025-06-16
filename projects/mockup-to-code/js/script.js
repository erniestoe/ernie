function showFaq() {
	const faqCards = document.querySelectorAll('.faq');
	
	faqCards.forEach((card) => {
		const button = card.querySelector('.show-text-button');
		const hiddenText = card.querySelector('.hidden-text');

		button.addEventListener('click', () => {
			hiddenText.classList.toggle('visually-hidden');
		})
	})
}

function toggleMobileMenu() {
	const toggleButton = document.querySelector('.mobile-menu-toggle');
	const mobileMenu = document.querySelector('#mobileMenu');

	toggleButton.addEventListener('click', () => {
		const isOpen = toggleButton.getAttribute('aria-expanded') === 'true';

		toggleButton.setAttribute('aria-expanded', !isOpen);
		mobileMenu.classList.toggle('visually-hidden');
	})
}

showFaq();
toggleMobileMenu();