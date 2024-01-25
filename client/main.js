import MoveDownAction from "./actions/MoveDownAction";
import MoveLeftAction from "./actions/MoveLeftAction";
import MoveRightAction from "./actions/MoveRightAction";
import MoveUpAction from "./actions/MoveUpAction";
import StopAction from "./actions/StopAction";
import Entity from "./Entity";
import GameAction from "./GameAction";
import GameException from "./GameException";
import GameLoop from "./GameLoop";
import GameState from "./GameState";
import Mage from "./Mage";
import Map from "./map";
import Melee from "./Melee";
import Ranger from "./Ranger";
import Skill from "./Skill";
import Tile from "./Tile";


function setup() {

    createCanvas(windowWidth, windowHeight);


    let melee = new Melee(Azou);

    gameLoop = new GameLoop(melee)
    registerAction(MoveDownAction);
    registerAction(MoveUpAction);
    registerAction(MoveLeftAction);
    registerAction(MoveRightAction);
    registerAction(Stop);
}

function draw() {

    gameLoop.isStarted();
    gameLoop.start();
}

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}