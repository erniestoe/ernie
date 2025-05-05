import {areaOfRectangularRoom} from "./e4p.js";

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

areaOfRectangularRoom();