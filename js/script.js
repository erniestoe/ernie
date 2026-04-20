window.onload = () => {

	const mainMenu = document.querySelector('.mobile-menu');
	const openMainButton = document.querySelector('#open');
	const closeMainButton = document.querySelector('#close');
	const circleCursor = document.getElementById('circle-cursor');
	const navItems = document.querySelectorAll('.main-nav ul li');
	const hoverLabel = document.getElementById('video-hover-label');
	const videos = document.querySelectorAll('.video');
	const buttons = document.querySelectorAll('.button');
	const timeElement = document.querySelector('#time');

	const blobElement = document.getElementById('blob-output');

	if (blobElement) {
		const CHARSET = ' ░▒▓█';
		const COLS = 80;
		const ROWS = Math.floor(COLS * 0.60);
		let warpAmt = 0.55;
		let time = 0;
		let rotX = 0.3, rotY = 0.4;
		let targetRotX = 0.3, targetRotY = 0.4;
		let dragging = false, lastMX = 0, lastMY = 0;
		 
		// ── Noise ─────────────────────────────────────────────────────────────────────
		const B = 256, BM = 255;
		const g3 = [];
		const p = new Uint8Array(B + B + 2);
		(function initNoise() {
		  for (let i = 0; i < B; i++) {
		    p[i] = i;
		    const theta = Math.random() * Math.PI * 2;
		    const phi   = Math.random() * Math.PI * 2;
		    g3[i] = [Math.cos(phi)*Math.cos(theta), Math.cos(phi)*Math.sin(theta), Math.sin(phi)];
		  }
		  for (let i = B - 1; i > 0; i--) {
		    const j = Math.floor(Math.random() * (i + 1));
		    [p[i], p[j]] = [p[j], p[i]];
		  }
		  for (let i = 0; i < B + 2; i++) {
		    p[B + i] = p[i];
		    g3[B + i] = g3[i];
		  }
		})();
		 
		function at3(rx,ry,rz,q){ return rx*q[0]+ry*q[1]+rz*q[2]; }
		function s_curve(t){ return t*t*(3-2*t); }
		function lerp(t,a,b){ return a+t*(b-a); }
		 
		function noise3(x,y,z) {
		  const bx0=(Math.floor(x))&BM, bx1=(bx0+1)&BM; const rx0=x-Math.floor(x), rx1=rx0-1;
		  const by0=(Math.floor(y))&BM, by1=(by0+1)&BM; const ry0=y-Math.floor(y), ry1=ry0-1;
		  const bz0=(Math.floor(z))&BM, bz1=(bz0+1)&BM; const rz0=z-Math.floor(z), rz1=rz0-1;
		  const sx=s_curve(rx0), sy=s_curve(ry0), sz=s_curve(rz0);
		  const i=p[bx0],j=p[bx1];
		  const b00=p[i+by0],b10=p[j+by0],b01=p[i+by1],b11=p[j+by1];
		  const u=lerp(sx, at3(rx0,ry0,rz0,g3[b00+bz0]), at3(rx1,ry0,rz0,g3[b10+bz0]));
		  const v=lerp(sx, at3(rx0,ry1,rz0,g3[b01+bz0]), at3(rx1,ry1,rz0,g3[b11+bz0]));
		  const a=lerp(sy,u,v);
		  const u2=lerp(sx, at3(rx0,ry0,rz1,g3[b00+bz1]), at3(rx1,ry0,rz1,g3[b10+bz1]));
		  const v2=lerp(sx, at3(rx0,ry1,rz1,g3[b01+bz1]), at3(rx1,ry1,rz1,g3[b11+bz1]));
		  const b2=lerp(sy,u2,v2);
		  return lerp(sz,a,b2);
		}
		 
		function rotateX(pt, a) {
		  return [pt[0], pt[1]*Math.cos(a)-pt[2]*Math.sin(a), pt[1]*Math.sin(a)+pt[2]*Math.cos(a)];
		}
		function rotateY(pt, a) {
		  return [pt[0]*Math.cos(a)+pt[2]*Math.sin(a), pt[1], -pt[0]*Math.sin(a)+pt[2]*Math.cos(a)];
		}
		 
		function sdf(px, py, pz, t) {
		  const r = Math.sqrt(px*px+py*py+pz*pz);
		  if (r < 0.001) return -1;
		  const nx=px/r, ny=py/r, nz=pz/r;
		  const freq = 1.8;
		  const disp = warpAmt * (
		    0.55 * noise3(nx*freq + t*0.25, ny*freq + t*0.18, nz*freq) +
		    0.30 * noise3(nx*freq*2.3 - t*0.15, ny*freq*2.3 + t*0.2, nz*freq*2.3 + t*0.1) +
		    0.15 * noise3(nx*freq*5 + t*0.05, ny*freq*5, nz*freq*5 - t*0.08)
		  );
		  return r - (1.0 + disp);
		}
		 
		function march(ox,oy,oz, dx,dy,dz, t) {
		  let td = 0;
		  for (let i = 0; i < 64; i++) {
		    const px=ox+dx*td, py=oy+dy*td, pz=oz+dz*td;
		    const d = sdf(px,py,pz,t);
		    if (d < 0.015) return { hit: true, px, py, pz };
		    if (td > 4.5) break;
		    td += Math.max(d * 0.55, 0.015);
		  }
		  return { hit: false };
		}
		 
		function getNormal(px,py,pz,t) {
		  const e = 0.012;
		  const nx = sdf(px+e,py,pz,t) - sdf(px-e,py,pz,t);
		  const ny = sdf(px,py+e,pz,t) - sdf(px,py-e,pz,t);
		  const nz = sdf(px,py,pz+e,t) - sdf(px,py,pz-e,t);
		  const len = Math.sqrt(nx*nx+ny*ny+nz*nz) || 1;
		  return [nx/len, ny/len, nz/len];
		}
		 
		function render() {
		  const chars = CHARSET;
		  const aspect = 2.1;
		  const camZ = 2.8;
		  const fov  = 1.1;
		  let lines = '';
		 
		  rotX += (targetRotX - rotX) * 0.08;
		  rotY += (targetRotY - rotY) * 0.08;
		 
		  const lx=0.6, ly=0.8, lz=0.5;
		  const ll=Math.sqrt(lx*lx+ly*ly+lz*lz);
		  const lxn=lx/ll, lyn=ly/ll, lzn=lz/ll;
		 
		  for (let row = 0; row < ROWS; row++) {
		    let line = '';
		    for (let col = 0; col < COLS; col++) {
		      const ux = (col / COLS - 0.5) * fov;
		      const uy = (row / ROWS - 0.5) * fov / aspect;
		 
		      let d = [ux, uy, -1.0];
		      const dlen = Math.sqrt(d[0]*d[0]+d[1]*d[1]+d[2]*d[2]);
		      d = [d[0]/dlen, d[1]/dlen, d[2]/dlen];
		 
		      d = rotateX(d, rotX);
		      d = rotateY(d, rotY);
		      let o = rotateX([0,0,camZ], rotX);
		      o = rotateY(o, rotY);
		 
		      const res = march(o[0],o[1],o[2], d[0],d[1],d[2], time);
		 
		      if (res.hit) {
		        const n = getNormal(res.px, res.py, res.pz, time);
		        const diff = Math.max(0, n[0]*lxn + n[1]*lyn + n[2]*lzn);
		        const amb  = 0.18;
		        const rr   = 2*(n[0]*lxn+n[1]*lyn+n[2]*lzn);
		        const sdot = Math.max(0, -d[0]*(n[0]*rr-lxn) - d[1]*(n[1]*rr-lyn) - d[2]*(n[2]*rr-lzn));
		        const spec = Math.pow(sdot, 14) * 0.35;
		        let bright = Math.min(1, amb + diff * 0.75 + spec);
		        const ci = Math.floor(bright * (chars.length - 1));
		        line += chars[Math.max(0, Math.min(chars.length-1, ci))];
		      } else {
		        line += ' ';
		      }
		    }
		    lines += line + '\n';
		  }
		 
		  document.getElementById('blob-output').textContent = lines;
		}
		 
		// ── Auto loop — always running ────────────────────────────────────────────────
		function loop() {
		  time += 0.018;
		  if (!dragging) targetRotY += 0.008;
		  render();
		  requestAnimationFrame(loop);
		}
		 
		// ── Drag to rotate ────────────────────────────────────────────────────────────
		const el = document.getElementById('blob-output');
		el.addEventListener('mousedown', e => { dragging=true; lastMX=e.clientX; lastMY=e.clientY; });
		window.addEventListener('mousemove', e => {
		  if (!dragging) return;
		  targetRotY += (e.clientX - lastMX) * 0.012;
		  targetRotX += (e.clientY - lastMY) * 0.012;
		  lastMX=e.clientX; lastMY=e.clientY;
		});
		window.addEventListener('mouseup', () => { dragging=false; });
		el.addEventListener('touchstart', e => { dragging=true; lastMX=e.touches[0].clientX; lastMY=e.touches[0].clientY; });
		window.addEventListener('touchmove', e => {
		  if (!dragging) return;
		  targetRotY += (e.touches[0].clientX-lastMX)*0.012;
		  targetRotX += (e.touches[0].clientY-lastMY)*0.012;
		  lastMX=e.touches[0].clientX; lastMY=e.touches[0].clientY;
		});
		window.addEventListener('touchend', () => { dragging=false; });
		 
		loop();
	}

	function updateTimeEST() {
	  const now = new Date();

	  // EST is UTC-5 (or UTC-4 during daylight saving time)
	  // Here we use Intl.DateTimeFormat to handle DST automatically
	  const options = { 
	    timeZone: 'America/New_York', 
	    hour: 'numeric', 
	    minute: '2-digit',
	    second: '2-digit',
	    hour12: true 
	  };

	  const formattedTime = new Intl.DateTimeFormat('en-US', options).format(now);

	  timeElement.innerText = formattedTime;
	}

	if(timeElement) {
		setInterval(updateTimeEST, 1000);
		
		updateTimeEST();
	}

	buttons.forEach(button => {
		button.addEventListener('click', () => {
			button.classList.toggle('opaque');
		});
	});

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

	    const startX = window.innerWidth / 2;
	    const startY = window.innerHeight / 2;
	    mouse.x = circle.x = startX;
	    mouse.y = circle.y = startY;

	    window.addEventListener('mousemove', e => {
	    	mouse.x = e.clientX;
	    	mouse.y = e.clientY;
	    });

	    const speed = 0.15;

	    const tick = () => {
	    	circle.x += (mouse.x - circle.x) * speed;
	    	circle.y += (mouse.y - circle.y) * speed;

	    	const offsetX = circleElement.offsetWidth  / 2;
	    	const offsetY = circleElement.offsetHeight / 2;

	    	circleElement.style.transform = `translate3d(${circle.x - offsetX}px, ${circle.y - offsetY}px, 0)`;

	    	requestAnimationFrame(tick);
	    }

	    tick();

	    const dogImageElement = document.querySelector('#dog');
	    const aboutImageElement = document.querySelector('#aboutPic');

	    dogImageElement.addEventListener("mouseenter", (event) => {
	    	aboutImageElement.src= "https://res.cloudinary.com/dhgciqwbz/image/upload/v1757456013/doc-1_vxkai4.jpg";
	    });

	     dogImageElement.addEventListener("mouseleave", (event) => {
	    	aboutImageElement.src= "https://res.cloudinary.com/dhgciqwbz/image/upload/v1753279197/resume-photo-2_wwhl4o.jpg";
	    });




}