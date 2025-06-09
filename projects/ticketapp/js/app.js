import { shows } from './data.js';

const APP = document.querySelector('#app');
let cart = [];

function renderPage(page, show, time, date) {
	if (page === 'home') {
		APP.innerHTML = landingPage();
	} else if (page === 'list') {
		APP.innerHTML = listPage();
	} else if (page === 'cart') {
		APP.innerHTML = cartPage();
	} else if (page === 'confirmation') {
		APP.innerHTML = confirmationPage();
	} else if (page === 'detail') {
		APP.innerHTML = detailPage(show);
	} else if (page === '101') {
		APP.innerHTML = theatre101Page(show, time, date);
	} else if (page == '102') {
		APP.innerHTML = theatre102Page(show, time, date);
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

function confirmationPage(){
	return `
		${cartPageMenu()}
		<h2>Thank you!<h2>
	`;
}

function renderTheaterSeats(seatCount, theatre, showId, time, date) {
	let seats = '';
	for (let i = 0; i < seatCount; i++) {
		seats += `<div 
		class="seat"
		data-seatId="${theatre} ${i + 1}"
		data-id="${showId}"
		data-time="${time}"
		data-date="${date}">
		</div>`
	}

	return seats;
}

function theatre101Page(show, time, date) {
	return `
		${mainMenu()}
		<h2>${show.title} Theatre 101 at ${time} on ${date}<h2>

		<div class="stage">STAGE</div>

		<div class="seats-container">
			${renderTheaterSeats(25, 101, show.id, time, date)}
		</div>
	`;
}

function theatre102Page(show, time, date) {
	return `
		${mainMenu()}
		<h2>${show.title} Theatre 102 at ${time} on ${date}<h2>

		<div class="stage">STAGE</div>

		<div class="seats-container">
			${renderTheaterSeats(50, 102, show.id, time, date)}
		</div>
	`;
}

function renderCartItems() {
	const groups = {};

	cart.forEach(ticket => {
		const key = `${ticket.title} | ${ticket.date} @ ${ticket.time}`;
		if (!groups[key]) {
			groups[key] = []
		}
		groups[key].push(ticket.seatId);
	});

	return Object.entries(groups).map(([key, seats]) => {
		return `
			<li>
				<strong>${key}</strong>
				<ul>
					${seats.map(seat => `<li>Seat ${seat}</li>`).join('')}
				</ul>
			</li>
		`;
	}).join('');
}

function updateCartCount() {
	const cartButton = document.querySelector('[data-page="cart"]');
	if (cartButton) {
		cartButton.textContent = `Cart ${cart.length}`;
	}
}

function cartPage() {
	return `
		${cartPageMenu()}

		<h2>Cart</h2>

		<ul>
			${renderCartItems()}
		</ul>

		${cart.length > 0 ? '<button id="clearCart">Clear Cart</button>' : ''}
		${cart.length > 0 ? '<button data-page="confirmation">Buy Tickets</button>' : ''}
	`;
}

//menus
function mainMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="list">All Shows</button>
			<button data-page="cart">Cart ${cart.length}</button>
		</nav>
	`;
}

function listPageMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="cart">Cart ${cart.length}</button>
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
		<select data-date="${show.id}">
			${show.showtimes.dates.map((date) => {
				return `
					<option value="${date}">${date}</option>
					`;
				}).join('')}
		</select>

		${show.showtimes.times.map((time) => {
			return `
				<button data-page="${show.theatreId}" data-id="${show.id}" data-time="${time}">${time}</button>
			`;
		}).join('')}
	`;
}

document.addEventListener('click', (event) => {
	if (event.target.matches('[data-page]')) {
		const page = event.target.dataset.page;
		const showId = event.target.dataset.id;
		const time = event.target.dataset.time;
		//null is a placeholder... just means "there is no show found yet, there might be one eventually tho"
		let foundShow = null;
		let date = null;

		if(showId) {
			const selectedDate = document.querySelector(`[data-date="${showId}"]`);
			if (selectedDate) {
				date = selectedDate.value;
			}
		}

		if(showId) {
			foundShow = shows.find(show => show.id === Number(showId));
		}

		renderPage(page, foundShow, time, date);
	}

	if (event.target.matches('[data-showtimes]')) {
		const showId = event.target.dataset.id;
		const element = document.querySelector(`[data-showtimes-container="${showId}"]`);
		const	foundShow = shows.find(show => show.id === Number(showId));

		if(element && foundShow) {
			element.innerHTML = renderShowtimes(foundShow);
		}
	}

	if (event.target.matches('.seat')) {
		const seatId = event.target.dataset.seatid;
		const showId = Number(event.target.dataset.id);
		const time = event.target.dataset.time;
		const date = event.target.dataset.date
		
		const foundShow = shows.find(show => show.id === showId);
		if (!foundShow) return; 

		event.target.classList.toggle('selected');

		const seatIndex = cart.indexOf(seatId);

		if (!cart.find(item => item.seatId === seatId)) {
			cart.push({
				showId: showId,
				title: foundShow.title,
				time,
				date,
				seatId
			})
		} else {
			cart = cart.filter(item => item.seatId !== seatId);
		}

		updateCartCount();
		
	}

	if (event.target.matches('#clearCart')) {
		
		cart = [];
		renderPage('cart');
		
	}
});

renderPage('list');