import { P5_NODE_ID } from './constants.js';
import GameState from './GameState.js';
import Player from './model/Player.js';
import Level from './scene/Level.js';
import Map from './model/Map.js';

const state = new GameState();
state.player = new Player();
state.scene = new Level(state);

console.log('game state:', state);