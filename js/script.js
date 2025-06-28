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

window.onload = () => {
	const mainMenu = document.querySelector('.menu');
	const optionsMenu = document.querySelector('.options-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const openOptionsButton = document.querySelector('#openOptionsMenu');
	const closeOptionsButton = document.querySelector('#closeOptionsMenu');

	if (openMainButton && mainMenu) {
		openMainButton.addEventListener('click', () => {
			mainMenu.classList.toggle('visually-hidden');
			if (optionsMenu && !optionsMenu.classList.contains('visually-hidden')) {
				optionsMenu.classList.add('visually-hidden');
			}
		});
	}

	if (closeMainButton && mainMenu) {
		closeMainButton.addEventListener('click', () => {
			mainMenu.classList.add('visually-hidden');
		});
	}

	if (openOptionsButton && optionsMenu) {
		openOptionsButton.addEventListener('click', () => {
			optionsMenu.classList.toggle('visually-hidden');
			if (mainMenu && !mainMenu.classList.contains('visually-hidden')) {
				mainMenu.classList.add('visually-hidden');
			}
		});
	}

	if (closeOptionsButton && optionsMenu) {
		closeOptionsButton.addEventListener('click', () => {
			optionsMenu.classList.add('visually-hidden');
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
}

// Homepage canvas

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


// E4P
const urlParameters = new URLSearchParams(window.location.search);
const formName = urlParameters.get('form');
const defaultPage = urlParameters.get('page');

if (!formName && defaultPage === 'programming') {areaOfRectangularRoom(), areaOfRectangularRoom2()};
if (formName === 'area') {areaOfRectangularRoom(), areaOfRectangularRoom2()};
if (formName === 'tax') {taxCalculator()};
if (formName === 'driving') {legalDrivingAge()};
if (formName === 'anagrams') {anagramChecker()};
if (formName === 'pizza') {pizzaParty()};
if (formName === 'temp') {tempConverter()};
if (formName === 'characters') {countingCharacters()};
if (formName === 'checkout') {selfCheckout(), selfCheckout2()};
if (formName === 'paint') {paintCalculator()};
if (formName === 'interest') {simpleInterest()};
if (formName === 'numberstonames') {numbersToNames()};
if (formName === 'addingnumbers') {addingNumbers()};