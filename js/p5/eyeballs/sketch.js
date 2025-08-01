const black = '#000000';
const white = '#eee';

function setup() {
  const canvas = createCanvas(500, 500);
  canvas.parent('eyeballs');
}

function draw() {
  background('#f1f1f1');
  fill(0);
  noStroke();
  rectMode(CENTER);
    
  push();
  translate(width/2, height/2);
  rotate(radians(frameCount));
  rect(0,0,50,500);
  pop();
    
  fill('#aaaaaa');
  push();
  translate(width/2, height/2);
  rotate(radians(-frameCount));
  rect(0,0,50,500);
  pop();
}