export function taxCalculator() {
	const form = document.querySelector('.tax-calculator form');
	const orderAmountInput = document.querySelector('input[name="amount"]');
	const stateInput = document.querySelector('input[name="state"]');
	const outputElement = document.querySelector('.tax-calculator .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
	
		let amount = Number(orderAmountInput.value);
		let state = stateInput.value.trim();

		if (!amount || !state) {
			outputElement.innerHTML = `<p class="error">Please enter a value for both fields</p>`;
		} else {
			let stateAbrev = state.toUpperCase();
			let stateFull = state.charAt(0).toUpperCase + state.slice(1).toLowerCase();

			if (stateAbrev === 'WI' || stateFull === 'Wisconsin') {
				let tax = amount * 0.055;
				let total = amount + tax;

				outputElement.innerHTML = `
					<p>Subtotal is $${amount.toFixed(2)}</p>
					<p>Tax is $${tax.toFixed(2)}</p>
					<p>Total is $${total.toFixed(2)}</p>
				`;
			} else {
				outputElement.innerHTML = `<p>Total is $${amount.toFixed(2)}</p>`;
			}
		}
	});
};