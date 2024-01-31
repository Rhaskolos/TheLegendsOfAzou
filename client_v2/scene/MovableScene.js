import AbstractScene from './AbstractScene.js';

class MovableScene extends AbstractScene {

  draw(sketch) {
    this.player.frameCountMovePlayer++;
  }

  // TODO: qwerty keyboard ZQSD -> WASD
  keyPressed(sketch) {
    switch (sketch.keyCode) {
      case 90: // Z 38
      case 38: // ↑
        this.player.isMovingUp = true;
        break;
      case 81: // Q 37
      case 37: // ←
        this.player.isMovingLeft = true;
        break;
      case 83: // S 40
      case 40: // ↓
        this.player.isMovingDown = true;
        break;
      case 68: // D 39
      case 39: // →
        this.player.isMovingRight = true;
        break;
    }
  }

  keyReleased(sketch) {
    switch (sketch.keyCode) {
      case 90: // Z
      case 38: // ↑
        this.player.isMovingUp = false;
        this.player.frameCountMovePlayer = 0;
        break;
      case 81: // Q
      case 37: // ←
        this.player.isMovingLeft = false;
        this.player.frameCountMovePlayer = 0;
        break;
      case 83: // S
      case 40: // ↓
        this.player.isMovingDown = false;
        this.player.frameCountMovePlayer = 0;
        break;
      case 68: // D
      case 39: // →
        this.player.isMovingRight = false;
        this.player.frameCountMovePlayer = 0;
        break;
    }
  }
  
}

export default MovableScene;
