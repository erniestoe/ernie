export function layoutGardenOptions() {
	const form = document.getElementById('gardenControls');
	const modules = document.querySelectorAll('.garden-module');

	if (!form || modules.length === 0) {
		console.log('Layout Garden: No form or modules found.');
		return;
	}

	console.log('Layout Garden: Initialized');

	form.addEventListener('input', () => {
		const fontSize = form.elements.fontSize.value + 'px';
		const fontWeight = form.elements.fontWeight.value;
		const borderRadius = form.elements.borderRadius.value + 'px';
		const colorMode = form.elements.colorMode.value;

		modules.forEach((mod) => {
			mod.querySelectorAll('*').forEach((el) => {
				el.style.fontSize = fontSize;
				el.style.fontWeight = fontWeight;
				el.style.borderRadius = borderRadius;
			});

			if (colorMode === 'bw') {
				mod.classList.add('bw-mode');
			} else {
				mod.classList.remove('bw-mode');
			}
		});
	});
}
