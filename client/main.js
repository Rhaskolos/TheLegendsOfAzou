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

let gameLoop;
let map;


function setup() {

    createCanvas(500, 500);


    let melee = new Melee(Azou);
    map = new Map(3,3);
    let tile = new Tile(1);
    melee.map = map;
    map.initializeEntityPosition(0,0);
    map.addObstacle(1,1,tile);
    let gameState = new GameState(melee,map);
    gameLoop = new GameLoop(gameState);
    gameLoop.registerAction(MoveDownAction);
    gameLoop.registerAction(MoveLeftAction);
    gameLoop.registerAction(MoveRightAction);
    gameLoop.registerAction(MoveUpAction);
    
    gameLoop.start();

    
}

function draw() {
    background(50);
   
    map.displayTable();
    
}

function keyPressed() {
    gameLoop.keyPressed();
    
}
