export function layoutGardenOptions() {
	const form = document.getElementById('gardenControls');
	const modules = document.querySelectorAll('.garden-module');

	if (!form || modules.length === 0) {
		console.log('Layout Garden: No form or modules found.');
		return;
	}

	console.log('Layout Garden: Initialized');

	const settingsMap = {
		fontSize: { cssProperty: 'fontSize', suffix: 'px', selector: '*' },
		fontWeight: { cssProperty: 'fontWeight', suffix: '', selector: '*' },
		borderRadius: { cssProperty: 'borderRadius', suffix: 'px', selector: '*' },
		unit: { cssProperty: '--spacing-unit', suffix: 'rem', selector: ':root' },
		spaceIncrement: { cssProperty: '--space-increment', suffix: '', selector: ':root' },
		accentHue: { cssProperty: '--accent-hue', suffix: '', selector: ':root' },
		accentSaturation: { cssProperty: '--accent-saturation', suffix: '%', selector: ':root' },
		accentLightness: { cssProperty: '--accent-lightness', suffix: '%', selector: ':root' },
		greySaturation: { cssProperty: '--grey-saturation', suffix: '%', selector: ':root' },
		textFrameY: { cssProperty: '--text-frame-y', suffix: 'em', selector: ':root' },
		textFrameRatio: { cssProperty: '--text-frame-ratio', suffix: '', selector: ':root' },
	};

	form.addEventListener('input', () => {
		Object.entries(settingsMap).forEach(([inputName, setting]) => {
			const input = form.elements[inputName];
			if (!input) return;

			const valueWithSuffix = input.value + setting.suffix;

			if (setting.selector === ':root') {
				document.documentElement.style.setProperty(setting.cssProperty, valueWithSuffix);
			} else {
				modules.forEach((mod) => {
					mod.querySelectorAll(setting.selector).forEach((el) => {
						el.style[setting.cssProperty] = valueWithSuffix;
					});
				});
			}
		});

		// Example toggle behavior
		if (form.elements.colorMode) {
			const colorMode = form.elements.colorMode.value;
			modules.forEach((mod) => {
				mod.classList.toggle('bw-mode', colorMode === 'bw');
			});
		}
	});
}
