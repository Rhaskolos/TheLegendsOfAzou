import Entity from "./Entity";

class Melee extends Entity {

    constructor(name) {
       
        super(name)

        this.type = 3;
        this.health = 10;
        this.physicalDamage = 5; 
        this.magicalDamage = 0;
        this.physicalResistance = 10;
        this.magicalResistance = 5;
        this.attackRange = 1;
        this.attackSpeed = 1;
        this.skill = [];
    }
}

export default Melee;