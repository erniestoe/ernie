export class CartPage {
	constructor (app){
		this.app = app;
	}

	render() {
		const allShowsButton = document.querySelector('#allShows');
		if (allShowsButton) allShowsButton.style.display = 'block';

		console.log('hello this is the cart...');
	}
}