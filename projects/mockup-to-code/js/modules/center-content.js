// import {centerCardData as data} from '../../data/modules/center-content-data.js';
async function fetchData() {
	const response = await fetch('data/modules/center-content-data.json');
	const data = await response.json();
	return data;
}

export async function renderCenterContentCards() {
	const contentCardsContainer = document.querySelector('#centerContentCardsContainer');
	const contentCards = contentCardsContainer.querySelector('#centerContentCards');

	const data = await fetchData();

	contentCards.innerHTML = centerContentCard(data);
}

function centerContentCard(data) {
	return data.map((card) => {
		return `
			<li>
				<h3 class="strong-voice">${card.title}</h3>
				<p>${card.text}</p>
			</li>
		`;
	}).join('');
	
}