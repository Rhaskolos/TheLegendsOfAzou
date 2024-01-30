import { API_URL } from '../constants.js';
//import Tile from './Tile.js';

class Map {

  _id;
  _height;
  _width;
  _name;
  _description;

  static build(id) {
    fetch(`${API_URL}/map/${id}`, {
      method: 'GET',
      credentials: 'include'
    })
      .then(data => {

      })
      .catch(err => {

      });
  }

  constructor(id){

  }

  get id() {
    return this._id;
  }
  set id(in_id) {
    this._id = in_id;
  }

  get height() {
    return this._height;
  }
  set height(in_height) {
    this._height = in_height;
  }

  get width() {
    return this._width;
  }
  set width(in_width) {
    this._width = in_width;
  }

  get name() {
    return this._name;
  }
  set name(in_name) {
    this._name = in_name;
  }

  get description() {
    return this._description;
  }
  set description(in_description) {
    this._description = in_description;
  }

}

export default Map;
