import {
	areaOfRectangularRoom,
	taxCalculator,
	legalDrivingAge,
	anagramChecker,
	pizzaParty,
	tempConverter,
	countingCharacters,
	selfCheckout,
	paintCalculator
} from "./e4p.js";

const openButton = document.querySelector('#open');
const closeButton = document.querySelector('#close');
const menu = document.querySelector('.menu');

openButton.addEventListener('click', function(event) {
	if (menu.classList.contains('visually-hidden') ) {
		menu.classList.remove('visually-hidden');
	} else {
		menu.classList.add('visually-hidden');
	}
});

closeButton.addEventListener('click', function(event) {
	if (menu.classList.contains('visually-hidden') ) {
		menu.classList.remove('visually-hidden');
	} else {
		menu.classList.add('visually-hidden');
	}
});

//Flickity
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity( elem, {
  // options
  cellAlign: 'left',
  contain: true
});

// E4P
const urlParameters = new URLSearchParams(window.location.search);
const formName = urlParameters.get('form');

if (formName === 'area') {areaOfRectangularRoom()};
if (formName === 'tax') {taxCalculator()};
if (formName === 'driving') {legalDrivingAge()};
if (formName === 'anagrams') {anagramChecker()};
if (formName === 'pizza') {pizzaParty()};
if (formName === 'temp') {tempConverter()};
if (formName === 'characters') {countingCharacters()};
if (formName === 'checkout') {selfCheckout()};
if (formName === 'paint') {paintCalculator()};