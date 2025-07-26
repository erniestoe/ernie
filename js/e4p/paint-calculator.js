export function paintCalculator() {
	const form = document.querySelector('.paint-calculator form');
	const lengthElement = form.querySelector('input[name="length"]');
	const widthElement = form.querySelector('input[name="width"]');
	const outputElement = document.querySelector('.paint-calculator .form-output');

	form.addEventListener('submit', function(event){
		event.preventDefault();

		let length = Number(lengthElement.value);
		let width = Number(widthElement.value);

		if (!length || !width) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs</p>`;
		} else {
			const gallonOfPaint = 350;
			let squareFeet = length * width;
			let gallonsNeeded = Math.ceil(squareFeet / gallonOfPaint);

			outputElement.innerHTML = `
				<p class="feedback">You will need ${gallonsNeeded} gallon${gallonsNeeded === 1 ? '' : 's'} of paint to cover ${squareFeet} square feet</p>
			`;
		}

	});
}