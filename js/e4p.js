export function areaOfRectangularRoom() {
	const form = document.querySelector('.area-of-rect-room form');
	const lengthInput = document.querySelector('input[name="length"]');
	const widthInput = document.querySelector('input[name="width"]');
	const outputElement = document.querySelector('.area-of-rect-room .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
		
		let length = Number(lengthInput.value);
		let width = Number(widthInput.value);


		if (!length || !width) {
			outputElement.innerHTML = `<p class="error">Please enter a value for both fields</p>`;
		} else {
			let squareFeet = length * width;
			let squareMeters = squareFeet * 0.09290304;

			outputElement.innerHTML = `
				<p>You entered dimensions of ${length} feet by ${width} feet</p>

				<p>The area is:</p>

				<p>${squareFeet} square feet</p>

				<p>${squareMeters.toFixed(2)} square meters</p>
			`;
		}
	});
};

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

export function legalDrivingAge() {
	const form = document.querySelector('.driving-age form');
	const ageInput = document.querySelector('input[name="age"]');
	const outputElement = document.querySelector('.driving-age .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
	
		let age = Number(ageInput.value);

		if (!age || age <= 0 || isNaN(age)) {
			outputElement.innerHTML = `<p class="error">Please enter a valid age</p>`;
		} else if (age >= 16) {
			outputElement.innerHTML = `
				<p class="feedback">You are old enough to legally drive!</p>
			`;
		} else {
			outputElement.innerHTML = `
				<p class="error">You are not old enough to legally drive!</p>
			`;
		}
	});
};

export function anagramChecker() {
	const form = document.querySelector('.anagrams form');
	const firstStringInput = document.querySelector('input[name="first"]');
	const secondStringInput = document.querySelector('input[name="second"]');
	const outputElement = document.querySelector('.anagrams .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
	
		let firstString = firstStringInput.value.trim();
		let secondString = secondStringInput.value.trim();

		if (!firstString || !secondString) {
			outputElement.innerHTML = `<p class="error">Please enter a string in both inputs</p>`;
		} else {
			let arrayOne = firstString.toLowerCase().replace(/\s/g, '').split('');
			let arrayTwo = secondString.toLowerCase().replace(/\s/g, '').split('');

			arrayOne.sort();
			arrayTwo.sort();

			if (arrayOne.join('') === arrayTwo.join('')) {
				outputElement.innerHTML = `<p class="feedback">${firstString} and ${secondString} are anagrams.</p>`;
			} else {
				outputElement.innerHTML = `<p class="error">${firstString} and ${secondString} are not anagrams.</p>`;
			}
		}
	});
};

export function pizzaParty() {
	const form = document.querySelector('.pizza-party form');
	const peopleInput = document.querySelector('input[name="people"]');
	const pizzasInput = document.querySelector('input[name="pizzas"]');
	const slicesInput = document.querySelector('input[name="slices"]');
	const outputElement = document.querySelector('.pizza-party .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
	
		let people = peopleInput.value;
		let pizzas = pizzasInput.value;
		let slices = slicesInput.value;

		if (people <= 0 || pizzas <= 0 || slices <= 0) {
			outputElement.innerHTML = `<p class="error">Please enter a number greater than 0</p>`;
		} else if (!people || !pizzas || !slices) {
			outputElement.innerHTML = `<p class="error">Please submit an answer for all inputs</p>`;
		} else {
			let totalSlices = pizzas * slices;
			let slicesPerPerson = totalSlices / people;
			let leftoverSlices = totalSlices % people;

			outputElement.innerHTML = `
				<p>${people} ${people === 1 ? "person" : "people"} with ${pizzas} ${pizzas === 1 ? "pizza" : "pizzas"}</p>

				<p>${people === 1 ? "They" : "Each person"} get ${slicesPerPerson} ${slicesPerPerson <= 1 ? "piece" : "pieces"} of pizza</p>

				<p>There ${leftoverSlices === 1 ? "is" : "are"} ${leftoverSlices === 0 ? "no" : leftoverSlices} leftover ${leftoverSlices === 1 ? "piece" : "pieces"}</p>
			`;
		}
	});
};

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
	}s
};

export function countingCharacters() {
	const form = document.querySelector('.characters form');
	const stringInput = document.querySelector('input[name="string"]');
	const outputElement = document.querySelector('.characters .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
		
		let string = stringInput.value.trim();

		if (!string) {
			outputElement.innerHTML = `<p class="error">Please enter a string</p>`;
		} else {
			outputElement.innerHTML = `<p class="feedback">${string} has ${string.length} characters</p>`;
		}
	});
};

export function selfCheckout() {
	const form = document.querySelector('.self-checkout form');
	const item1PriceElement = document.querySelector('input[name="item1Price"]');
	const item1QuantityElement = document.querySelector('input[name="item1Quantity"]');
	const item2PriceElement = document.querySelector('input[name="item2Price"]');
	const item2QuantityElement = document.querySelector('input[name="item2Quantity"]');
	const item3PriceElement = document.querySelector('input[name="item3Price"]');
	const item3QuantityElement = document.querySelector('input[name="item3Quantity"]');
	const outputElement = document.querySelector('.self-checkout .form-output');

	form.addEventListener('submit', function(event) {
		event.preventDefault();

		let item1Price = Number(item1PriceElement.value);
		let item1Quantity = Number(item1QuantityElement.value);
		let item2Price = Number(item2PriceElement.value);
		let item2Quantity = Number(item2QuantityElement.value);
		let item3Price = Number(item3PriceElement.value);
		let item3Quantity = Number(item3QuantityElement.value);


		if (!item1Price || !item1Quantity || !item2Price || !item2Quantity || !item3Price || !item3Quantity ) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs</p>`;
		} else {
			let item1Total = item1Price * item1Quantity;
			let item2Total = item2Price * item2Quantity;
			let item3Total = item3Price * item3Quantity;
			let subtotal = getSubtotal(item1Total, item2Total, item3Total);
			let tax = getTax(subtotal);
			let total = getTotal(subtotal, tax);

			function getSubtotal(item1, item2, item3) {
				return item1 + item2 + item3;
			}

			function getTax(subtotal) {
				return subtotal * 0.055;
			}

			function getTotal(subtotal, tax) {
				return subtotal + tax;
			}

			outputElement.innerHTML = `
				<p>Subtotal: $${subtotal.toFixed(2)}</p>
				<p>Tax: $${tax.toFixed(2)}</p>
				<p>Total: $${total.toFixed(2)}</p>
			`;
		}
	});
};