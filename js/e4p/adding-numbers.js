export function addingNumbers() {
	const form = document.querySelector('.adding-numbers form');
	const numberInputElement = form.querySelector('input[name="number"]');
	const outputElement = document.querySelector('.adding-numbers .form-output');

	let count = 0;
	let total = 0

	form.addEventListener('submit', function(event){
		event.preventDefault();

		let number = Number(numberInputElement.value);

		if (!number || isNaN(number)) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs and that they have a valid number</p>`;
			return;
		}

		total += number;
		count += 1;

		if (count === 5) {
			outputElement.innerHTML = `<p class="feedback">The total is ${total}</p>`;
			count = 0;
			total = 0;
		} else {
			outputElement.innerHTML = `<p class="feedback">You've entered ${count} of 5 numbers</p>`;	
		}

		numberInputElement.value = '';
	});
};
