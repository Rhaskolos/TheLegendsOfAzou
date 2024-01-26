

class Mage extends Entity {

    constructor(name) {
       
        super(name)

        this.type = 2;
        this.health = 10;
        this.physicalDamage = 0; 
        this.magicalDamage = 6;
        this.physicalResistance = 5;
        this.magicalResistance = 10;
        this.attackRange = 1;
        this.attackSpeed = 1;
        this.skill = [];
    }
}


