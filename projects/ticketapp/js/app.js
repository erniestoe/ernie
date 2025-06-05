import { shows } from './data.js';

const APP = document.querySelector('#app');
const cart = [];

function renderPage(page, show) {
	if (page === 'home') {
		APP.innerHTML = landingPage();
	} else if (page === 'list') {
		APP.innerHTML = listPage();
	} else if (page === 'cart') {
		APP.innerHTML = cartPage();
	} else if (page === 'detail') {
		APP.innerHTML = detailPage(show);
	} else if (page === 'theatre') {
		APP.innerHTML = theatrePage();
	} else {
		APP.innerHTML = landingPage();
	}
}

function landingPage() {
	return `
		<h1>ticketapp</h1>

		<h2>The best ticket buying app you have ever used.</h2>

		<button data-page="list">Get Started</button>
	`;
}

function showCard() {
	
}

function showList() {
	return shows.map((show) => {
		return `
			<li>
				<h3>${show.title}</h3>
				<picture>
					<img src="${show.image}">
				</picture>

				<button data-page="detail" data-id="${show.id}">Show Info</button>
				<button data-showtimes="notActive" data-id="${show.id}">Check Showtimes</button>

				<div data-showtimes-container="${show.id}"></div>
			</li>
		`;
	}).join('');
}

function listPage() {
	return `
		${listPageMenu()}

		<h2>Now Showing</h2>

		<ul>
			${showList()}
		</ul>
	`;
}

function detailPage(show) {
	return `
		${mainMenu()}

		<h2>${show.title}</h2>

		<picture>
			<img src="${show.image}">
		</picture>

		<p>${show.description}</p>

		<button data-showtimes="notActive" data-id="${show.id}">Check Showtimes</button>

		<div data-showtimes-container="${show.id}"></div>
	`;
}

function theatrePage() {
	return `
		${mainMenu()}
		<h2>Theatre<h2>
	`;
}

function cartPage() {
	return `
		${cartPageMenu()}

		<h2>Cart</h2>
	`;
}

//menus
function mainMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="list">All Shows</button>
			<button data-page="cart">Cart</button>
		</nav>
	`;
}

function listPageMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="cart">Cart</button>
		</nav>
	`;
}

function cartPageMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="list">All Shows</button>
		</nav>
	`;
}

function renderShowtimes(show) {
	return `
		<select>
			${show.showtimes.dates.map((date) => {
				return `
					<option>${date}</option>
					`;
				}).join('')}
		</select>

		${show.showtimes.times.map((time) => {
			return `
				<button data-page="theatre">${time}</button>
			`;
		}).join('')}
	`;
}


document.addEventListener('click', (event) => {
	if (event.target.matches('[data-page]')) {
		const page = event.target.dataset.page;
		const showId = event.target.dataset.id;
		//null is a placeholder... just means "there is no show found yet, there might be one eventually tho"
		let foundShow = null;

		if(showId) {
			foundShow = shows.find(show => show.id === Number(showId));
		}

		renderPage(page, foundShow);
	}

	if (event.target.matches('[data-showtimes]')) {
		const showId = event.target.dataset.id;
		const element = document.querySelector(`[data-showtimes-container="${showId}"]`);
		const	foundShow = shows.find(show => show.id === Number(showId));

		if(element && foundShow) {
			element.innerHTML = renderShowtimes(foundShow);
		}
	}
});

renderPage('list');