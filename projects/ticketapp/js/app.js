import {LandingPage} from './pages/landing-page.js';
import {ShowListPage} from './pages/show-list-page.js';
import {ShowDetailPage} from './pages/show-detail-page.js';
import {CartPage} from './pages/cart-page.js';

//"main (or central)" class, modeled after react...kinda?
class App {
	constructor(rootSelector) {
		this.root = document.querySelector(rootSelector);
		//routing like in PHP but in js?
		this.routes = {
			landing: () => new LandingPage(this),
			shows: () => new ShowListPage(this),
			showDetails: () => new ShowDetailPage(this),
			cart: () => new CartPage(this), 
		};
		this.currentPage = null; 

		const allShowsButton = document.querySelector('#allShows');
		const cartButton = document.querySelector('#cart');
		const homeButton = document.querySelector('#home');

		if (allShowsButton) {
			allShowsButton.addEventListener('click', () => {
				this.navigate('shows');
			})
		}

		if (cartButton) {
			cartButton.addEventListener('click', () => {
				this.navigate('cart');
			})
		}

		if (homeButton) {
			homeButton.addEventListener('click', () => {
				localStorage.clear();
				this.start();
			})
		}

	}

	navigate(pageName, data = {}) {
		localStorage.setItem('currentPage', JSON.stringify({ page: pageName, data }));

		this.root.innerHTML = '';
		document.querySelector('nav').style.display = pageName === 'landing' ? 'none' : 'block';
		if (pageName === 'showDetails') {
			this.currentPage = new ShowDetailPage(this);
			this.currentPage.render(data);
		} else {
			this.currentPage = this.routes[pageName]();
			this.currentPage.render();
		}	
	}

	start() {
		const saved = localStorage.getItem('currentPage');
		if (saved) {
			const { page, data } = JSON.parse(saved);
			if (this.routes[page]) {
				this.navigate(page, data);
				return;
			}
		}
		this.navigate('landing');
	}
}

const app = new App('#app');
app.start();