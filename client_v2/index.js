import { P5_NODE_ID } from './constants.js';
import Level from './scene/Level.js';

const level = new Level();

let myp5 = new p5(level.sketch, P5_NODE_ID);

