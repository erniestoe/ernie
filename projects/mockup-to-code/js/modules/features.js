async function fetchData() {
	const response = await fetch('data/modules/features-data.json');
	const data = await response.json();
	return data;
}

export async function renderFeaturesCards() {
	const data = await fetchData();
	const featuresCardsContainer = document.querySelector('#featuresCardsContainer');
	const featuresCards = featuresCardsContainer.querySelector('#featuresCards');

	featuresCards.innerHTML = featureCard(data);
}

function featureCard(data) {
	return data.map((card) => {
		return `
			<li>
				<picture>
					${card.svg}
				</picture>
				<h3 class="strong-voice">${card.title}</h3>
				<p>${card.text}</p>
			</li>
		`
	}).join('');
}