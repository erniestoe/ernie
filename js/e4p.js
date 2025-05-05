export function areaOfRectangularRoom() {
	const form = document.querySelector('.area-of-rect-room');
	const length = document.querySelector('input[name="length"]');
	const width = document.querySelector('input[name="width"]');

	form.addEventListener('submit', function(event) {
		event.preventDefault();
		console.log('you submitted this form dawg');
	});
};