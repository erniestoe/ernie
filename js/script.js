import { areaOfRectangularRoom, areaOfRectangularRoom2 } from "./area-of-a-rectangular-room.js";
import { taxCalculator } from "./tax-calculator.js";
import { legalDrivingAge } from "./legal-driving-age.js";
import { anagramChecker } from "./anagram-checker.js";
import { pizzaParty } from "./pizza-party.js"; 
import { tempConverter } from "./temp-converter.js"; 
import { countingCharacters } from "./counting-characters.js"; 
import { selfCheckout, selfCheckout2 } from "./self-checkout.js"; 
import { paintCalculator } from "./paint-calculator.js"; 
import { simpleInterest } from "./simple-interest.js"; 
import { numbersToNames } from "./numbers-to-names.js"; 
import { addingNumbers } from "./adding-numbers.js"; 
import { layoutGardenOptions } from './layout-garden-options.js';

window.onload = () => {
	const mainMenu = document.querySelector('.menu');
	const optionsMenu = document.querySelector('.options-menu');
	const exerciseIndexMenu = document.querySelector('.exercise-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const openOptionsButton = document.querySelector('#openOptionsMenu');
	const closeOptionsButton = document.querySelector('#closeOptionsMenu');
	const openExerciseIndexButton = document.querySelector('#openExerciseIndexMenu');
	const closeExerciseIndexButton = document.querySelector('#closeExerciseIndexMenu');

	if (openMainButton && mainMenu) {
		openMainButton.addEventListener('click', () => {
			mainMenu.classList.toggle('visually-hidden');
			openMainButton.classList.toggle('main-menu-opened');

			if (optionsMenu && !optionsMenu.classList.contains('visually-hidden')) {
				optionsMenu.classList.add('visually-hidden');
			}

			if (exerciseIndexMenu && !exerciseIndexMenu.classList.contains('visually-hidden')) {
				exerciseIndexMenu.classList.add('visually-hidden');
			}
		});
	}

	if (closeMainButton && mainMenu) {
		closeMainButton.addEventListener('click', () => {
			mainMenu.classList.add('visually-hidden');
			openMainButton.classList.toggle('main-menu-opened');

		});
	}

	if (openOptionsButton && optionsMenu) {
		openOptionsButton.addEventListener('click', () => {
			optionsMenu.classList.toggle('visually-hidden');
			if (mainMenu && !mainMenu.classList.contains('visually-hidden')) {
				mainMenu.classList.add('visually-hidden');
				openMainButton.classList.toggle('main-menu-opened');
			}
		});
	}

	if (closeOptionsButton && optionsMenu) {
		closeOptionsButton.addEventListener('click', () => {
			optionsMenu.classList.add('visually-hidden');
		});
	}

	if (openExerciseIndexButton && exerciseIndexMenu) {
		openExerciseIndexButton.addEventListener('click', () => {
			exerciseIndexMenu.classList.toggle('visually-hidden');
			if (mainMenu && !mainMenu.classList.contains('visually-hidden')) {
				mainMenu.classList.add('visually-hidden');
				openMainButton.classList.toggle('main-menu-opened');
			}
		});
	}

	if (closeExerciseIndexButton && exerciseIndexMenu) {
		closeExerciseIndexButton.addEventListener('click', () => {
			exerciseIndexMenu.classList.add('visually-hidden');
		});
	}

	var elem = document.querySelector('.main-carousel');
	if (elem) {
		new Flickity( elem, {
  		// options
  		cellAlign: 'left',
  		contain: true
		});
	}

	layoutGardenOptions();

	// E4P
	const urlParameters = new URLSearchParams(window.location.search);
	const exerciseId = urlParameters.get('id');
	const currentPage = urlParameters.get('page');

	if (!exerciseId && currentPage === 'programming') {
		areaOfRectangularRoom();
		areaOfRectangularRoom2();
	}

	if (exerciseId === 'area') {
		areaOfRectangularRoom();
		areaOfRectangularRoom2();
	}
	if (exerciseId === 'tax') taxCalculator();
	if (exerciseId === 'driving') legalDrivingAge();
	if (exerciseId === 'anagrams') anagramChecker();
	if (exerciseId === 'pizzaParty') pizzaParty();
	if (exerciseId === 'converter') tempConverter();
	if (exerciseId === 'characters') countingCharacters();
	if (exerciseId === 'selfCheckout') {
		selfCheckout();
		selfCheckout2();
	}
	if (exerciseId === 'paint') paintCalculator();
	if (exerciseId === 'interest') simpleInterest();
	if (exerciseId === 'numbersToNames') numbersToNames();
	if (exerciseId === 'addingNumbers') addingNumbers();
}

// // Homepage canvas

const canvas = document.getElementById("homepageCanvas");
const ctx = canvas.getContext("2d");

// Match canvas internal pixel resolution to CSS size
function resizeCanvasToMatchCSS(canvas) {
	const dpr = window.devicePixelRatio || 1;
	const rect = canvas.getBoundingClientRect();

	// Set actual pixel dimensions (internal resolution)
	canvas.width = Math.floor(rect.width * dpr);
	canvas.height = Math.floor(rect.height * dpr);

	// Set canvas style width/height (visual size)
	canvas.style.width = `${rect.width}px`;
	canvas.style.height = `${rect.height}px`;

	// Scale the drawing context so 1 unit = 1 CSS pixel
	ctx.setTransform(1, 0, 0, 1, 0, 0); // Reset transform
	ctx.scale(dpr, dpr);
}

// Redraw background fill
function fillCanvasBackground() {
	ctx.fillStyle = "#FBFBF6";
	ctx.fillRect(0, 0, canvas.width, canvas.height);
}

// Animation logic
const boxSize = 20;

function eraseRandomSquare() {
	const cols = Math.floor(canvas.width / boxSize);
	const rows = Math.floor(canvas.height / boxSize);

	const randCol = Math.floor(Math.random() * cols);
	const randRow = Math.floor(Math.random() * rows);

	const x = randCol * boxSize;
	const y = randRow * boxSize;

	ctx.fillStyle = "black";
	ctx.fillRect(x, y, boxSize, boxSize);
}

function startErasing() {
	setInterval(() => {
		const count = Math.floor(Math.random() * 5) + 1;
		for (let i = 0; i < count; i++) {
			eraseRandomSquare();
		}
	}, Math.random() * 150 + 10);
}

// Initialize
function initCanvas() {
	resizeCanvasToMatchCSS(canvas);
	fillCanvasBackground();
	startErasing();
}

document.addEventListener("DOMContentLoaded", () => {
	requestAnimationFrame(() => {
		initCanvas();
	});
});


// const canvas = document.getElementById("homepageCanvas");
// const ctx = canvas.getContext("2d");

// const boxSize = 50;
// const filledSquares = []; // Array of square objects now
// const colors = ["#FFE317", "#F98A03", "#F16C6A", "#D47D8D", "#A390B2", "#584D84", "#8594D1", "#589DDA", "#2EB0B8", "#69CF79"];

// function resizeCanvasToMatchCSS(canvas) {
// 	const dpr = window.devicePixelRatio || 1;
// 	const rect = canvas.getBoundingClientRect();

// 	canvas.width = Math.floor(rect.width * dpr);
// 	canvas.height = Math.floor(rect.height * dpr);

// 	canvas.style.width = `${rect.width}px`;
// 	canvas.style.height = `${rect.height}px`;

// 	ctx.setTransform(1, 0, 0, 1, 0, 0);
// 	ctx.scale(dpr, dpr);
// }

// function fillCanvasBackground() {
// 	ctx.fillStyle = "#FBFBF6";
// 	ctx.fillRect(0, 0, canvas.width, canvas.height);
// }

// function drawSquare(x, y) {
// 	const color = colors[Math.floor(Math.random() * colors.length)];
// 	filledSquares.push({
// 		x,
// 		y,
// 		color,
// 		isFalling: false,
// 		velocityY: 0
// 	});
// 	ctx.fillStyle = color;
// 	ctx.fillRect(x, y, boxSize, boxSize);
// }

// function handleMouseMove(e) {
// 	const rect = canvas.getBoundingClientRect();
// 	const x = Math.floor((e.clientX - rect.left) / boxSize) * boxSize;
// 	const y = Math.floor((e.clientY - rect.top) / boxSize) * boxSize;

// 	// Check if square already exists at that position
// 	const key = `${x},${y}`;
// 	const exists = filledSquares.some(sq => sq.x === x && sq.y === y);
// 	if (!exists) {
// 		drawSquare(x, y);
// 	}
// }

// // Animation logic
// function drawSquares() {
// 	ctx.clearRect(0, 0, canvas.width, canvas.height);

// 	for (let square of filledSquares) {
// 		if (square.isFalling) {
// 			// Explosion physics
// 			square.vy += .5; // gravity
// 			square.x += square.vx;
// 			square.y += square.vy;
// 		}
// 		ctx.fillStyle = square.color;
// 		ctx.fillRect(square.x, square.y, boxSize, boxSize);
// 	}
// }


// let isAnimating = false;
// function animate() {
// 	if (!isAnimating) return;

// 	drawSquares();

// 	// Stop animation if all blocks have fallen out of view
// 	const anyOnScreen = filledSquares.some(sq => sq.y < canvas.height);
// 	if (anyOnScreen) {
// 		requestAnimationFrame(animate);
// 	} else {
// 		isAnimating = false;
// 	}
// }

// // Setup fall button
// document.addEventListener("DOMContentLoaded", () => {
// 	const fallButton = document.getElementById("fallButton");
// 	if (fallButton) {
// 		fallButton.addEventListener("click", () => {
// 			for (let square of filledSquares) {
// 				square.isFalling = true;

// 				// Explosion-style velocity
// 				const angle = Math.random() * Math.PI * 2; // Random direction
// 				const speed = Math.random() * 10 + 5;      // Random speed

// 				square.vx = Math.cos(angle) * speed;
// 				square.vy = Math.sin(angle) * speed;
// 			}
// 			isAnimating = true;
// 			animate();
// 		});

// 	}
// });

// // Initialize canvas + listeners
// function initCanvas() {
// 	resizeCanvasToMatchCSS(canvas);
// 	fillCanvasBackground();
// 	canvas.addEventListener("mousemove", handleMouseMove);
// }

// document.addEventListener("DOMContentLoaded", () => {
// 	requestAnimationFrame(() => {
// 		initCanvas();
// 	});
// });

// // Hint fade-out logic
// let hasInteractedWithCanvas = false;
// if (canvas) {
// 	canvas.addEventListener("mouseenter", () => {
// 		if (!hasInteractedWithCanvas) {
// 			hasInteractedWithCanvas = true;
// 			const hint = document.querySelector(".canvas-hint");
// 			if (hint) {
// 				hint.classList.add("fade-out");
// 			}
// 		}
// 	});
// }




