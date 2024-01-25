

class Entity {

    name;
    type;
    health;
    physicalDamage;
    magicalDamage;
    physicalResistance;
    magicalResistance;
    attackRange;
    attackSpeed;
    skill;
    orientation;
    xPosition;
    yPosition;
    map;

    constructor (name) {
        this.name = name;
    }

    get name() {
        return this.name;
    }

    set name(value) {
        this.name = value;
    }

    get type(){
        return this.type;
    }

    set type(value){
        this.type = value;
    }

    get health() {
        return this.health;
    }

    set health(value) {
        this.health = value;
    }

    get physicalDamage() {
        return this.physicalDamage;
    }

    set physicalDamage(value) {
        this.physicalDamage = value;
    }

    get magicalDamage() {
        return this.magicalDamage;
    }

    set magicalDamage(value) {
        this.magicalDamage = value;
    }
    get physicalResistance() {
        return this.physicalResistance;
    }

    set physicalResistance(value) {
        this.physicalResistance = value;
    }

    get magicalResistance() {
        return this.magicalResistance;
    }

    set magicalResistance(value) {
        this.magicalResistance = value;
    }

    get attackRange() {
        return this.attackRange;
    }

    set attackRange(value) {
        this.attackRange = value;
    }

    get attackSpeed() {
        return this.attackSpeed;
    }

    set attackSpeed(value) {
        this.attackSpeed = value;
    }

    get skill() {
        return this.skill;
    }

    set skill(value) {
        this.skill = value;
    }

    get orientation() {
        return this.orientation;
    }

    set orientation(value) {
        this.orientation = value;
    }

    get xPosition() {
        return this.xPosition;
    }

    set xPosition(value) {
        this.xPosition = value;
    }

    get yPosition() {
        return this.yPosition;
    }

    set yPosition(value) {
        this.yPosition = value;
    }

    get map() {
        return this.map;
    }

    set map(value) {
        this.map = value;
    }


}

export default Entity;