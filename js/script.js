window.onload = () => {
	const mainMenu = document.querySelector('.mobile-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const circleCursor = document.getElementById('circle-cursor');
	const navItems = document.querySelectorAll('.main-nav ul li');

	document.querySelectorAll('[data-tilt]').forEach(el => {
	  el.style.opacity = 1;
	});

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
	const timeline2 = gsap.timeline();

	timeline
	  .to("#shape", {
	    duration: 4,
	    morphSVG: "M50,50 H150 V150 H50 Z",
	    fill: "#FFC800",
	    ease: "elastic.out(1, 0.5)"
	  })
	  .to("#shape", {
	    duration: 4,
	    morphSVG: "M100,40 L160,160 L40,160 Z",
	    fill: "#69CF79",
	    ease: "elastic.out(1, 0.5)"
	  })
	  .to("#shape", {
	    duration: 4,
	    morphSVG: "M100,50 A50,50 0 1,0 100.01,50 Z",
	    fill: "#2EB0B8",
	    ease: "elastic.out(1, 0.5)"
	  });

	// timeline2
	// 	if (navItems.length) {
	//   		timeline2.from('[data-tilt]', {
	//    		x: -100,
	//     		opacity: 0,
	//     		ease: "elastic.out(1, 0.5)",
	//     		duration: 1,
	//     		stagger: 0.15,
	//   		});
	// 	}


	timeline2
	  gsap.from('work-card', {
	    x: 100,
	    opacity: 0,
	    ease: "elastic.out(1, 0.5)",
	    duration: 1,
	    stagger: 0.2,
	  }, "<");

	  gsap.from('.tag', {
	    y: -100,
	    opacity: 0,
	    ease: "elastic.out(1, 0.5)",
	    duration: 1,
	    stagger: 0.3,
	  }, "<");

	  document.querySelectorAll('work-card').forEach(card => {
	    const btn = card.querySelector('.video-control');
	    const video = card.querySelector('video');

	    if (!btn || !video) return;

	    btn.addEventListener('click', (e) => {
	      e.stopPropagation();

	      // Pause all other videos + reset their buttons
	      document.querySelectorAll('work-card video').forEach(v => {
	        if (v !== video) {
	          v.pause();
	          const otherBtn = v.closest('work-card')?.querySelector('.video-control');
	          if (otherBtn) {
	            otherBtn.setAttribute('aria-pressed', 'false');
	            otherBtn.textContent = 'PLAY';
	          }
	        }
	      });

	      if (video.paused) {
	        video.play();
	        btn.setAttribute('aria-pressed', 'true');
	        btn.textContent = 'PAUSE';
	      } else {
	        video.pause();
	        btn.setAttribute('aria-pressed', 'false');
	        btn.textContent = 'PLAY';
	      }
	    });

	    // Keep UI in sync if video is paused/played by other means
	    video.addEventListener('play', () => {
	      btn.setAttribute('aria-pressed', 'true');
	      btn.textContent = 'PAUSE';
	    });
	    video.addEventListener('pause', () => {
	      btn.setAttribute('aria-pressed', 'false');
	      btn.textContent = 'PLAY';
	    });
	  });


	  const videos = document.querySelectorAll('.video');

	  videos.forEach(video => {
	    video.addEventListener('mouseenter', () => {
	      video.play();
	    });
	    
	    video.addEventListener('mouseleave', () => {
	      video.pause();
	    });
	  });


}