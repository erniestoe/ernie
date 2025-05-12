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

export function areaOfRectangularRoom2() {
	const container = document.querySelector('.area-v2');
	if (!container) return;

	const lengthInput = container.querySelector('input[name="length"]');
	const widthInput = container.querySelector('input[name="width"]');
	const output = container.querySelector('.form-output');

	function calculateAndRender() {
		const length = lengthInput.valueAsNumber;
		const width = widthInput.valueAsNumber;

		if (isNaN(length) || isNaN(width)) {
			output.innerHTML = '';
			return;
		}

		const squareFeet = length * width;
		const squareMeters = squareFeet * 0.09290304;

		output.innerHTML = `
			<p>You entered dimensions of ${length} feet by ${width} feet.</p>
			<p>The area is:</p>
			<p>${squareFeet.toFixed(2)} square feet</p>
			<p>${squareMeters.toFixed(2)} square meters</p>
		`;
	}

	lengthInput.addEventListener('input', calculateAndRender);
	widthInput.addEventListener('input', calculateAndRender);
};