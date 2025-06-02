import {shows} from '../data.js';

export class ShowListPage {
	constructor(app) {
		this.app = app;
	}

	render() {
		const nav = document.querySelector('nav');
		nav.style.display = 'block';
		const allShowsButton = nav.querySelector('#allShows');
  		if (allShowsButton) allShowsButton.style.display = 'none';
		const section = document.createElement('section');
		section.innerHTML = `<h2>Now Showing</h2>`;
		const list = document.createElement('ul');

		shows.forEach(show => {
			const li = document.createElement('li');
			li.innerHTML = `
				<h3>${show.title}</h3>
				<p>${show.description}</p>
				<button id="info" class="info">Show Info</button>
				<button id="tickets" class="tickets">Buy Tickets</button>
			`;

			const infoButton = li.querySelector('.info');
			infoButton.addEventListener('click', () => {
				this.app.navigate('showDetails', { showId: show.id});
			});

			list.appendChild(li);
		});


		section.appendChild(list);
		this.app.root.appendChild(section);
	}
}