import entities from '../entities.js';
import MovableScene from './MovableScene.js';
import Entity from '../model/Entity.js';

class Level extends MovableScene {

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
    // console.log('level.preload slime:', slime, this);
  }

  setup(sketch) {
    sketch.createCanvas(1100, 800);
  }

  draw(sketch) {
    super.draw();
  }
  
}

export default Level;
