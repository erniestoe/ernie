export class LandingPage {
	constructor(app) {
		this.app = app;
	}

	render() {
		const section = document.createElement('section');
		section.innerHTML = `
			<inner-column>
				<h2>The best ticket buying app you've ever used.</h2>
				<button id="getStarted">Get Started</button>
			</inner-column>
		`;
		section.querySelector('#getStarted').addEventListener('click', () => {
			this.app.navigate('shows');
		});
		this.app.root.appendChild(section);
	}
}