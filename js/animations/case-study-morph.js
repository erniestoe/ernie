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