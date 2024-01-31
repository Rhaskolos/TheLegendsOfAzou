class AbstractScene {

  _sketch;
  _state;

  constructor(state) {
    this.state = state;
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

}

export default AbstractScene;
