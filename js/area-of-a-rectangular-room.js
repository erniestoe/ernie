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