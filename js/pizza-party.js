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