class Player {

  _login;
  _email;
  _isMovingUp;
  _isMovingDown;
  _isMovingLeft;
  _isMovingRight;
  _frameCountMove;

  constructor() {
    // TODO: grab login & email from PHP session
    this.isMovingUp = false;
    this.isMovingDown = false;
    this.isMovingLeft = false;
    this.isMovingTight = false;
    this.isMoving = false;
    this.frameCountMove = 0;
  }

  get login() {
    return this._login;
  }
  set login(in_login) {
    this._login = in_login;
  }

  get email() {
    return this._email;
  }
  set email(in_email) {
    this._email = in_email;
  }

  get isMovingUp() {
    return this._isMovingUp;
  }
  set isMovingUp(in_isMovingUp) {
    this._isMovingUp = in_isMovingUp;
  }

  get isMovingDown() {
    return this._isMovingDown;
  }
  set isMovingDown(in_isMovingDown) {
    this._isMovingDown = in_isMovingDown;
  }

  get isMovingLeft() {
    return this._isMovingLeft;
  }
  set isMovingLeft(in_isMovingLeft) {
    this._isMovingLeft = in_isMovingLeft;
  }

  get isMovingRight() {
    return this._isMovingRight;
  }
  set isMovingRight(in_isMovingRight) {
    this._isMovingRight = in_isMovingRight;
  }

  get frameCountMove() {
    return this._frameCountMove;
  }
  set frameCountMove(in_frameCountMove) {
    this._frameCountMove = in_frameCountMove;
  }

}

export default Player;
