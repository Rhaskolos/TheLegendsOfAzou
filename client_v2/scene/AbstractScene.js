class AbstractScene {

  _sketch;
  _state;
  _player;

  constructor(state) {
    this.state = state;
    this.player = state.player;
  }

  get sketch() {
    if (!this._sketch){
      this._sketch = (sketch) => {
        Object.getOwnPropertyNames(Object.getPrototypeOf(this)).forEach(name => {
          if (name === 'constructor'){ return; }
          sketch[name] = this[name].bind(this, sketch);
        });
      };
    }
    return this._sketch;
  }

  get state() {
    return this._state;
  }
  set state(in_state) {
    this._state = in_state;
  }

  get player() {
    return this._player;
  }
  set player(in_player) {
    this._player = in_player;
  }


}

export default AbstractScene;
