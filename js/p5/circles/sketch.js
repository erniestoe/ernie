const circlesSketch = (p) => {
  let amount = 800;
  let speed = 0.2;

  p.setup = () => {
    const parent = document.getElementById('circles'); // your target div
    const w = parent.clientWidth || 500;
    const h = 500;
    const c = p.createCanvas(w, h);
    c.parent('circles');
  };

  p.draw = () => {
    p.background('#f1f1f1');
    p.fill(0);
    p.noStroke();
    p.translate(p.width / 200, p.height / 200);

    for (let i = 0; i <= amount; i++) {
      let y = p.map(i, 0, amount, -p.height * 250, p.height * 250);
      let angle = (p.frameCount * speed) - (i * 50);
      let x = p.map(p.tan(p.radians(angle)), -1, 1, p.width * 2, p.width * 50);
      p.push();
      p.translate(p.radians(x) / 2, p.radians(y) / -2);
      p.ellipse(0, 0, 20, 20);
      p.pop();
    }
  };
};

new p5(circlesSketch, 'circles');