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
document.addEventListener("DOMContentLoaded", (event) => {
	var elem = document.querySelector('.main-carousel');
	var flkty = new Flickity( elem, {
  	// options
  	cellAlign: 'left',
  	contain: true
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