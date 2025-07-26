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
