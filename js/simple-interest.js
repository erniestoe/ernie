export function simpleInterest() {
	const form = document.querySelector('.simple-interest form');
	const principalElement = form.querySelector('input[name="principal"]');
	const roiElement = form.querySelector('input[name="roi"]');
	const yearsElement = form.querySelector('input[name="years"]');
	const outputElement = document.querySelector('.simple-interest .form-output');

	form.addEventListener('submit', function(event){
		event.preventDefault();

		let principal = Number(principalElement.value);
		let roi = Number(roiElement.value);
		let years = Number(yearsElement.value);

		function calculateInterest(principal, roi, years) {
			return principal * (1 + ((roi / 100) * years));
		};

		if (!principal || !roi || !years) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs</p>`;
		} else {
			outputElement.innerHTML = `
				<p class="feedback">After ${years} ${years === 1 ? "year" : "years"} at ${roi}%,
				the investment will be worth $${calculateInterest(principal, roi, years).toFixed(2)}</p>
			`;
		}
	});
};