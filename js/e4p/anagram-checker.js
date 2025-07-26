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