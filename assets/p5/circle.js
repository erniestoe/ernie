class Circle {
  constructor() {
    this.x = random (0, width);
    this.y = random (0, height);
    this.r = random(20, 50);
    this.dx = 2;
    this.dy = 1;
  }
  
  move() {
    this.x += this.dx;
    this.y += this.dy;

    if (this.x + this.r >= width || this.x - this.r <= 0) {
      this.dx *= -1;
    }

    if (this.y + this.r >= height || this.y - this.r <= 0) {
      this.dy *= -1;
    }

  }
  
  display() {
    noFill();
    ellipse(this.x, this.y, this.r*2, this.r*2);
  }
}