class Scene {
  _sketch;

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

}

export default Scene;
