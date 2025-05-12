export function tempConverter() {
	const form = document.querySelector('.temp-converter form');
	const stepContainer = document.querySelector('.form-step');
	const outputElement = form.querySelector('.form-output');

	let currentStep = 1;
	let choice = '';

	renderStep1();

	form.addEventListener('submit', function(event) {
		event.preventDefault();
		
		if (currentStep === 1) {
			const input = form.querySelector('input[name="choice"]').value.trim().toLowerCase();

			if (input !== 'c' && input !== 'f') {
				outputElement.innerHTML = `<p class="error">Please enter either C or F</p>`;
			} else {
				choice = input;
				currentStep = 2;
				renderStep2();
			}
		} else if (currentStep == 2) {
			const tempValue = form.querySelector('input[name="temp"]').value.trim();

			if (!tempValue || isNaN(tempValue)){
				outputElement.innerHTML = `<p class="error">Please enter a valid number</p>`;
			} else {
				const temp = Number(tempValue);
				let result, unit;

				if (choice === 'c') {
					result = ((temp - 32) * 5 / 9).toFixed(2);
					unit = 'Celsius';
				} else {
					result = ((temp * 9 / 5) + 32).toFixed(2);
					unit = 'Fahrenheit';
				}

				currentStep = 3;
				renderResult(result, unit);
			} 
		} else if (currentStep === 3) {
			currentStep = 1;
			choice = '';
			renderStep1();
		}
	});

	function renderStep1() {
		stepContainer.innerHTML = `
			<p>Press C to convert from Fahrenheit to Celsius</p>
			<p>Press F to convert from Celsius to Fahrenheit</p>
			<div class="field">
				<label>Your Choice:</label>
				<input type="text" name="choice">
			</div>
			<button type="submit">Next Step</button>
		`;
		outputElement.innerHTML = '';
	}

	function renderStep2() {
		const label = choice === 'c' ? 'Fahrenheit' : 'Celsius';
		stepContainer.innerHTML = `
			<div class="field">
				<label>Enter the temperature in ${label}:</label>
				<input type="number" name="temp">
			</div>
			<button type="submit">Convert Temperature</button>
		`;
		outputElement.innerHTML = '';
	}

	function renderResult(value, unit) {
		stepContainer.innerHTML = `
			<p>The temperature in ${unit} is ${value}°</p>
			<button type="submit">Convert Again?</button>
		`;
		outputElement.innerHTML = '';
	}
};
