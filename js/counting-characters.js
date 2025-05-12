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