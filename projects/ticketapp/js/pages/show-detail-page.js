import {shows} from '../data.js';

export class ShowDetailPage {
	constructor(app) {
		this.app = app;
	}

	render(data) {
		const nav = document.querySelector('nav');
		nav.style.display = 'block';
		const allShowsButton = nav.querySelector('#allShows');
		if (allShowsButton) allShowsButton.style.display = 'block';

		const showId = data?.showId;
		const show = shows.find(s => s.id === showId);

		if (!show) {
			this.app.root.innerHTML = '<p>Show not found.</p>';
			return;
		}

		const section = document.createElement('section');
		section.innerHTML = `
			<inner-column>
				<h2>${show.title}</h2>
				<p>${show.description}</p>
				<button id="buyTickets">Buy Tickets</button>
			</inner-column>
		`;

		this.app.root.appendChild(section);
	}
}