export function numbersToNames() {
	const form = document.querySelector('.numbers-to-names form');
	const monthNumberElement = form.querySelector('input[name="monthname"]');
	const outputElement = document.querySelector('.numbers-to-names .form-output');
	const months = [
		"January",
		"February",
		"March",
		"April",
		"May",
		"June",
		"July",
		"August",
		"September",
		"October",
		"November",
		"December"
	];

	form.addEventListener('submit', function(event){
		event.preventDefault();

		const monthNumber = Number(monthNumberElement.value);

		if (!monthNumber || isNaN(monthNumber)) {
			outputElement.innerHTML = `<p class="error">Please make sure there are no empty inputs and that they have a valid number</p>`;
		} else if (monthNumber > 12 || monthNumber < 1) {
			outputElement.innerHTML = `<p class="error">Please enter a number between 1 and 12</p>`;
		} else {
			outputElement.innerHTML = `<p class="feedback">The name of the month is ${months[monthNumber - 1]}</p>`;
		}
	});
};