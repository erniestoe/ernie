import {LandingPage} from './pages/landing-page.js';
import {ShowListPage} from './pages/show-list-page.js';
import {ShowDetailPage} from './pages/show-detail-page.js';

//"main (or central)" class, modeled after react...kinda
class App {
	constructor(rootSelector) {
		this.root = document.querySelector(rootSelector);
		//routing like in PHP but in js?
		this.routes = {
			landing: () => new LandingPage(this),
			shows: () => new ShowListPage(this),
			showDetails: () => new ShowDetailPage(this),
		};
		this.currentPage = null; 
	}

	navigate(pageName, data = {}) {
		this.root.innerHTML = '';
		document.querySelector('nav').style.display = pageName === 'landing' ? 'none' : 'block';
		if (pageName === 'showDetails') {
			this.currentPage = new ShowDetailPage(this);
			this.currentPage.render(data); // data might be { showId: 1 }
		} else {
			this.currentPage = this.routes[pageName]();
			this.currentPage.render();
		}	
	}

	start() {
		this.navigate('landing');
	}
}

const app = new App('#app');
app.start();