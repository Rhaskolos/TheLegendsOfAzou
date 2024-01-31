import { P5_NODE_ID } from './constants.js';

class GameState {

  _player;
  _scene;
  _p5Instance;

  get player() {
    return this._player;
  }
  set player(in_player) {
    this._player = in_player;
  }

  get scene() {
    return this._scene;
  }
  set scene(in_scene) {
    this._scene = in_scene;
    this.p5Instance = new p5(this.scene.sketch, P5_NODE_ID);
  }

  get p5Instance() {
    return this._p5Instance;
  }
  set p5Instance(in_p5Instance) {
    this._p5Instance = in_p5Instance;
  }

};

export default GameState;
