const eyeballsSketch = (p) => {
  const black = '#000000';
  const white = '#eee';

  p.setup = () => {
    const parent = document.getElementById('eyeballs');
    const w = parent?.clientWidth || 500;
    const h = 500;
    const c = p.createCanvas(w, h);
    c.parent('eyeballs');
    p.rectMode(p.CENTER);
    p.noStroke();
  };

  p.windowResized = () => {
    const parent = document.getElementById('eyeballs');
    const w = parent?.clientWidth || 500;
    p.resizeCanvas(w, p.height);
  };

  p.draw = () => {
    p.background('#f5f5f5');

    p.fill(black);
    p.push();
    p.translate(p.width / 2, p.height / 2);
    p.rotate(p.radians(p.frameCount));
    p.rect(0, 0, 50, 500);
    p.pop();

    p.fill('#aaaaaa');
    p.push();
    p.translate(p.width / 2, p.height / 2);
    p.rotate(p.radians(-p.frameCount));
    p.rect(0, 0, 50, 500);
    p.pop();
  };
};

new p5(eyeballsSketch, 'eyeballs');