import { CELL_HEIGHT, CELL_WIDTH } from '../constants.js';

class Entity {

  _name;
  _sprite;

  _type;
  _xPosition;
  _yPosition;
  _health;
  _moveSpeed;
  _attackSpeed;
  _attackRange;
  _physicalDamage;
  _magicalDamage;
  _physicalResistance;
  _magicalResistance;
  _orientation;
  _skill;
  _map;
  
  constructor() {
  }

  render(sketch) {
    sketch.image(
      this.sprite,
      this.xPosition,
      this.yPosition
    );
  }

  get name() {
    return this._name;
  }
  set name(in_name) {
    this._name = in_name;
  }

  get sprite() {
    return this._sprite;
  }
  set sprite(in_sprite) {
    this._sprite = in_sprite;
  }

  get type() {
    return this._type;
  }
  set type(in_type) {
    this._type = in_type;
  }

  get health() {
    return this._health;
  }
  set health(in_health) {
    this._health = in_health;
  }

  get moveSpeed() {
    return this._moveSpeed;
  }
  set moveSpeed(in_moveSpeed) {
    this._moveSpeed = in_moveSpeed;
  }

  get physicalDamage() {
    return this._physicalDamage;
  }
  set physicalDamage(in_physicalDamage) {
    this._physicalDamage = in_physicalDamage;
  }

  get magicalDamage() {
    return this._magicalDamage;
  }
  set magicalDamage(in_magicalDamage) {
    this._magicalDamage = in_magicalDamage;
  }

  get physicalResistance() {
    return this._physicalResistance;
  }
  set physicalResistance(in_physicalResistance) {
    this._physicalResistance = in_physicalResistance;
  }

  get magicalResistance() {
    return this._magicalResistance;
  }
  set magicalResistance(in_magicalResistance) {
    this._magicalResistance = in_magicalResistance;
  }

  get attackRange() {
    return this._attackRange;
  }
  set attackRange(in_attackRange) {
    this._attackRange = in_attackRange;
  }

  get attackSpeed() {
    return this._attackSpeed;
  }
  set attackSpeed(in_attackSpeed) {
    this._attackSpeed = in_attackSpeed;
  }

  get skill() {
    return this._skill;
  }
  set skill(in_skill) {
    this._skill = in_skill;
  }

  get orientation() {
    return this._orientation;
  }
  set orientation(in_orientation) {
    this._orientation = in_orientation;
  }

  get xPosition() {
    return this._xPosition;
  }
  set xPosition(in_xPosition) {
    this._xPosition = in_xPosition;
  }

  get yPosition() {
    return this._yPosition;
  }
  set yPosition(in_yPosition) {
    this._yPosition = in_yPosition;
  }

  get map() {
    return this._map;
  }
  set map(in_map) {
    this._map = in_map;
  }

  get sprite() {
    return this._sprite;
  }
  set sprite(in_sprite) {
    this._sprite = in_sprite;
  }

}

export default Entity;
