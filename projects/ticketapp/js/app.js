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
		<section class="landing-page">
			<h1 class="strong-voice">ticketapp</h1>

			<h2 class="loud-voice">The best ticket buying app you have ever used.</h2>

			<button data-page="list">Get Started</button>
		</section>
	`;
}

function showCard() {
	
}

function showList() {
	return shows.map((show) => {
		return `
			<li class="show-card">
				<h3 class="loud-voice">${show.title}</h3>
				<picture>
					<img src="${show.image}">
				</picture>

				<div class="buttons">
					<button data-page="detail" data-id="${show.id}">Show Info</button>
					<button data-showtimes="notActive" data-id="${show.id}">Showtimes</button>
				</div>
				
				<div data-showtimes-container="${show.id}" class="showtimes-container"></div>
			</li>
		`;
	}).join('');
}

function listPage() {
	return `
		${listPageMenu()}

		<h2 class="strong-voice">Now Showing</h2>

		<ul>
			${showList()}
		</ul>
	`;
}

function detailPage(show) {
	return `
		${mainMenu()}
		<div class="show-card">
			<h2 class="loud-voice">${show.title}</h2>

			<picture>
				<img src="${show.image}">
			</picture>

			<p>${show.description}</p>

			<button data-showtimes="notActive" data-id="${show.id}">Showtimes</button>

			<div data-showtimes-container="${show.id}" class="showtimes-container"></div>
		</div>
	`;
}

function confirmationPage(){
	return `
		${cartPageMenu()}
		<h2 class="strong-voice">Thank you!<h2>

		<p>Here are your tickets!</p>

		<ul>
		${renderTickets()}
		</ul>
	`;
}

function renderTheaterSeats(seatCount, theatre, showId, time, date) {
	let seats = '';
	for (let i = 0; i < seatCount; i++) {
		const seatId = `${theatre} ${i + 1}`;
		const isSelected = cart.find(ticket =>
			ticket.seatId === seatId &&
			ticket.showId === showId &&
			ticket.time === time &&
			ticket.date === date
		);

		seats += `<div 
		class="seat ${isSelected ? 'selected' : ''}"
		data-seatId="${seatId}"
		data-id="${showId}"
		data-time="${time}"
		data-date="${date}">
		</div>`
	}

	return seats;
}

function theatre101Page(show, time, date) {
	return `
		<section class="theatre-page">
			${mainMenu()}

			<div class="theatre-title">
				<h2 class="loud-voice">${show.title}<h2>

				<h3 class="strong-voice">Theatre 102 at ${time} on ${date}</h3>
			</div>

			<div class="stage strong-voice">STAGE</div>

			<div class="seats-container">
				${renderTheaterSeats(25, 101, show.id, time, date)}
			</div>

			<div class="ticket-overview">
				<ul>
					${renderCartItems()}
				</ul>

				${cart.length > 0 ? '<button data-page="cart">Checkout</button>' : ''}
			</div>
		</section>
	`;
}

function theatre102Page(show, time, date) {
	return `
		<section class="theatre-page">
			${mainMenu()}
			<div class="theatre-title">
				<h2 class="loud-voice">${show.title}<h2>

				<h3 class="strong-voice">Theatre 102 at ${time} on ${date}</h3>
			</div>

			<div class="stage">STAGE</div>

			<div class="seats-container">
				${renderTheaterSeats(50, 102, show.id, time, date)}
			</div>

			<div class="ticket-overview">
				<ul>
					${renderCartItems()}
				</ul>
				${cart.length > 0 ? '<button data-page="cart">Checkout</button>' : ''}
			</div>
		</section>
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
			<li class="cart-item">
				<p class="strong-voice">${key}</p>
				<ul>
					${seats.map(seat => `<li>Seat ${seat}</li>`).join('')}
				</ul>
				<p><span class="strong-voice">Total:</span> $${seats.length * 10}</p>
			</li>
		`;
	}).join('');
}

function renderTickets() {
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
			<li class="ticket">
				<p class="strong-voice">${key}</p>
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
		cartButton.textContent = `Cart (${cart.length})`;
	}
}

function cartPage() {
	return `
		<section class="cart-page"?>
			${cartPageMenu()}

			${cart.length === 0 ? `<h2 class="strong-voice">No seats picked yet!</h2>` : ''}

			<ul>
				${renderCartItems()}
			</ul>

			<div class="cart-buttons">
				${cart.length > 0 ? '<button id="clearCart">Clear Cart</button>' : ''}
				${cart.length > 0 ? '<button data-page="confirmation">Buy Tickets</button>' : ''}
			</div
		</section>
	`;
}

//menus
function mainMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="list">All Shows</button>
			<button data-page="cart">Cart (${cart.length})</button>
		</nav>
	`;
}

function listPageMenu() {
	return `
		<nav>
			<button data-page="home">Home</button>
			<button data-page="cart">Cart (${cart.length})</button>
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

		<div class="showtimes-buttons">
		${show.showtimes.times.map((time) => {
			return `
				<button data-page="${show.theatreId}" data-id="${show.id}" data-time="${time}">${time}</button>
			`;
		}).join('')}
		</div>
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

		// event.target.classList.toggle('selected');

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

		const page = String(foundShow.theatreId);
		renderPage(page, foundShow, time, date);
		
	}

	if (event.target.matches('#clearCart')) {
		
		cart = [];
		renderPage('cart');
		
	}
});

renderPage('list');