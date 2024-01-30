import entities from '../entities.js';
import Scene from '../model/Scene.js';
import Entity from '../model/Entity.js';

class Level extends Scene {

  preload(sketch) {
    const { name, sprite } = entities[1];
    const slime = new Entity();
    slime.type = 1;
    slime.health = 10;
    slime.physicalDamage = 6;
    slime.magicalDamage = 0;
    slime.physicalResistance = 5;
    slime.magicalResistance = 3;
    slime.attackRange = 1;
    slime.attackSpeed = 1;
    slime.skill = 1;
    slime.name = name;
    slime.sprite = sketch.loadImage(sprite);
    console.log('level.preload slime:', slime, this);
  }

  setup(sketch) {
    sketch.createCanvas(1100, 800);
  }

  draw() {

  }

  keyPressed() {
    switch (keyCode) {
      case 90: // Z
        isMovingUp = true;
        break;
      case 83: // S
        isMovingDown = true;
        break;
      case 81: // Q
        isMovingLeft = true;
        break;
      case 68: // D
        isMovingRight = true;
        break;
    }
  }

  keyReleased() {
    switch (keyCode) {
      case 90: // Z
        isMovingUp = false;
        frameCountMovePlayer = 0;
        break;
      case 83: // S
        isMovingDown = false;
        frameCountMovePlayer = 0;
        break;
      case 81: // Q
        isMovingLeft = false;
        frameCountMovePlayer = 0;
        break;
      case 68: // D
        isMovingRight = false;
        frameCountMovePlayer = 0;
        break;
    }
  }
  
}

export default Level;
