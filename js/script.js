// import { areaOfRectangularRoom, areaOfRectangularRoom2 } from "./area-of-a-rectangular-room.js";
// import { taxCalculator } from "./tax-calculator.js";
// import { legalDrivingAge } from "./legal-driving-age.js";
// import { anagramChecker } from "./anagram-checker.js";
// import { pizzaParty } from "./pizza-party.js"; 
// import { tempConverter } from "./temp-converter.js"; 
// import { countingCharacters } from "./counting-characters.js"; 
// import { selfCheckout, selfCheckout2 } from "./self-checkout.js"; 
// import { paintCalculator } from "./paint-calculator.js"; 
// import { simpleInterest } from "./simple-interest.js"; 
// import { numbersToNames } from "./numbers-to-names.js"; 
// import { addingNumbers } from "./adding-numbers.js"; 

window.onload = () => {
	const mainMenu = document.querySelector('.mobile-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const circleCursor = document.getElementById('circle-cursor');

	if (openMainButton && mainMenu) {
		openMainButton.addEventListener('click', () => {
			mainMenu.classList.toggle('visually-hidden');
			openMainButton.classList.toggle('main-menu-opened');
		});
	}

	if (closeMainButton && mainMenu) {
		closeMainButton.addEventListener('click', () => {
			mainMenu.classList.add('visually-hidden');
			openMainButton.classList.toggle('main-menu-opened');

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

	//morphing shape
	gsap.registerPlugin(MorphSVGPlugin);

	const timeline = gsap.timeline({ repeat: -1 });

	timeline
	  .to("#shape", {
	    duration: 5,
	    morphSVG: "M50,50 H150 V150 H50 Z",
	    fill: "#FFC800",
	    ease: "elastic.out(1, 0.5)"
	  })
	  .to("#shape", {
	    duration: 5,
	    morphSVG: "M100,40 L160,160 L40,160 Z",
	    fill: "#69CF79",
	    ease: "elastic.out(1, 0.5)"
	  })
	  .to("#shape", {
	    duration: 5,
	    morphSVG: "M100,50 A50,50 0 1,0 100.01,50 Z",
	    fill: "#2EB0B8",
	    ease: "elastic.out(1, 0.5)"
	  });

	// E4P
	// const urlParameters = new URLSearchParams(window.location.search);
	// const exerciseId = urlParameters.get('id');
	// const currentPage = urlParameters.get('page');

	// if (currentPage === 'exercise' && exerciseId === 'area') {
	// 	areaOfRectangularRoom();
	// 	areaOfRectangularRoom2();
	// }
	// if (exerciseId === 'tax') taxCalculator();
	// if (exerciseId === 'driving') legalDrivingAge();
	// if (exerciseId === 'anagrams') anagramChecker();
	// if (exerciseId === 'pizzaParty') pizzaParty();
	// if (exerciseId === 'converter') tempConverter();
	// if (exerciseId === 'characters') countingCharacters();
	// if (exerciseId === 'selfCheckout') {
	// 	selfCheckout();
	// 	selfCheckout2();
	// }
	// if (exerciseId === 'paint') paintCalculator();
	// if (exerciseId === 'interest') simpleInterest();
	// if (exerciseId === 'numbersToNames') numbersToNames();
	// if (exerciseId === 'addingNumbers') addingNumbers();
}