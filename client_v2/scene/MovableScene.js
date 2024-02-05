import AbstractScene from './AbstractScene.js';

class MovableScene extends AbstractScene {

  draw(sketch) {
    this.scene.player.frameCountMovePlayer++;
  }

  // TODO: qwerty keyboard ZQSD -> WASD
  keyPressed(sketch) {
    const player = this.state.player;
    switch (sketch.keyCode) {
      case 90: // Z 38
      case 38: // ↑
        player.isMovingUp = true;
        break;
      case 81: // Q 37
      case 37: // ←
        player.isMovingLeft = true;
        break;
      case 83: // S 40
      case 40: // ↓
        player.isMovingDown = true;
        break;
      case 68: // D 39
      case 39: // →
        player.isMovingRight = true;
        break;
    }
  }

  keyReleased(sketch) {
    const player = this.state.player;
    switch (sketch.keyCode) {
      case 90: // Z
      case 38: // ↑
        player.isMovingUp = false;
        player.frameCountMovePlayer = 0;
        break;
      case 81: // Q
      case 37: // ←
        player.isMovingLeft = false;
        player.frameCountMovePlayer = 0;
        break;
      case 83: // S
      case 40: // ↓
        player.isMovingDown = false;
        player.frameCountMovePlayer = 0;
        break;
      case 68: // D
      case 39: // →
        player.isMovingRight = false;
        player.frameCountMovePlayer = 0;
        break;
    }
  }
  
}

export default MovableScene;
