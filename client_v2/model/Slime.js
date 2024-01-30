import Entity from './Entity.js';
import entities from '../entities.js';

class Slime extends Entity {

  constructor() {
    super();
    this.type               = 1;
    this.health             = 10;
    this.physicalDamage     = 6;
    this.magicalDamage      = 0;
    this.physicalResistance = 5;
    this.magicalResistance  = 3;
    this.attackRange        = 1;
    this.attackSpeed        = 1;
    this.skill              = 1;
  }

}

export default Slime;
