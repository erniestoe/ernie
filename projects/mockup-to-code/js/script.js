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

showFaq();