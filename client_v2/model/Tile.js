class Tile {

  _type;
  _xPosition;
  _yPosition;
  _map;
  _sprite;

  constructor(type) {
    this.type = type;
  }
  
  get type() {
    return this._type;
  }
  set type(in_type) {
    this._type = in_type;
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

export default Tile;
