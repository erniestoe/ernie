window.onload = () => {

	const mainMenu = document.querySelector('.mobile-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const circleCursor = document.getElementById('circle-cursor');
	const navItems = document.querySelectorAll('.main-nav ul li');
	const hoverLabel = document.getElementById('video-hover-label');
	const videos = document.querySelectorAll('.video');

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

	  videos.forEach(video => {
	    video.addEventListener('mouseenter', () => {
	      video.play();
	    });
	    
	    video.addEventListener('mouseleave', () => {
	      video.pause();
	    });
	  });

	  // Track mouse position
	  document.addEventListener('mousemove', e => {
	    hoverLabel.style.left = `${e.clientX}px`;
	    hoverLabel.style.top = `${e.clientY}px`;
	  });

	  // Show label on video hover
	  videos.forEach(video => {
	  	if (!video.classList.contains('collage')) {
	  		video.addEventListener('mouseenter', () => {
	  		  hoverLabel.style.opacity = 1;
	  		});

	  		video.addEventListener('mouseleave', () => {
	  		  hoverLabel.style.opacity = 0;
	  		});
	  	}
	    
	  });

	  gsap.registerPlugin(MorphSVGPlugin);

	  // Inset constants
	  const INSET = 16;
	  const SIZE = 200 - INSET * 2; // 184

	  // Circle: centered, radius adjusted
	  const CIRCLE   = `M100,${INSET} A${SIZE/2},${SIZE/2} 0 1,0 100.01,${INSET} Z`;

	  // Square: top-left (8,8) → bottom-right (192,192)
	  const SQUARE   = `M${INSET},${INSET} H${200-INSET} V${200-INSET} H${INSET} Z`;

	  // Triangle: top vertex at (100,8), base corners at (192,192) and (8,192)
	  const TRIANGLE = `M100,${INSET} L${200-INSET},${200-INSET} L${INSET},${200-INSET} Z`;

	  // 1) Set starting state: shape1=triangle, shape2=circle, shape3=square
	  gsap.set("#shape1", { morphSVG: TRIANGLE, fill: "#141414" });
	  gsap.set("#shape2", { morphSVG: CIRCLE,   fill: "#141414" });
	  gsap.set("#shape3", { morphSVG: SQUARE,   fill: "#141414" });

	  // 2) Master timeline with synced steps
	  const tl = gsap.timeline({
	    repeat: -1,
	    defaults: { duration: 2.5, ease: "elastic.out(1, 0.5)" }
	  });

	  // STEP 1: shape1 T->S, shape2 C->S, shape3 S->T (all together)
	  tl.add("step1")
	    .to("#shape1", { morphSVG: SQUARE,   fill: "#141414" }, "step1")
	    .to("#shape2", { morphSVG: SQUARE,   fill: "#141414" }, "step1")
	    .to("#shape3", { morphSVG: TRIANGLE, fill: "#141414" }, "step1")

	  // STEP 2: shape1 S->C, shape2 S->T, shape3 T->C (all together)
	    .add("step2", "+=0.2")
	    .to("#shape1", { morphSVG: CIRCLE,   fill: "#141414" }, "step2")
	    .to("#shape2", { morphSVG: TRIANGLE, fill: "#141414" }, "step2")
	    .to("#shape3", { morphSVG: CIRCLE,   fill: "#141414" }, "step2")

	  // STEP 3: return to start state (shape1 C->T, shape2 T->C, shape3 C->S)
	    .add("step3", "+=0.2")
	    .to("#shape1", { morphSVG: TRIANGLE, fill: "#141414" }, "step3")
	    .to("#shape2", { morphSVG: CIRCLE,   fill: "#141414" }, "step3")
	    .to("#shape3", { morphSVG: SQUARE,   fill: "#141414" }, "step3");

// Flickity stuff?
	    const elem = document.querySelector('.main-carousel');
	    if (elem) {
	        const flkty = new Flickity(elem, {
	          cellAlign: 'left',
	          contain: true,
	          wrapAround: true,       // optional
	          imagesLoaded: true      // waits for images before sizing cells
	        });
	      }

	    const circleElement = document.querySelector('.circle');
	    const mouse = {x: 0, y: 0}, circle = {x:0, y: 0};

	    window.addEventListener('mousemove', e => {
	    	mouse.x = e.x;
	    	mouse.y = e.y;
	    });

	    const speed = 0.15;

	    const tick = () => {
	    	circle.x += (mouse.x - circle.x) * speed;
	    	circle.y += (mouse.y - circle.y) * speed;

	    	circleElement.style.transform = `translate(${circle.x}px, ${circle.y}px`;

	    	window.requestAnimationFrame(tick);
	    }

	    tick();




}