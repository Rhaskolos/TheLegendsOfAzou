
let currentFrame = 0;
let y = 0;




function setup() {

    createCanvas(1200, 1200);
}

function draw() {


    mapTest.displayTable();
    updateFrameSlimeTest();
}

function keyPressed() {

    switch (keyCode) {
        case 90: // Z
            MoveUpAction.run(meleeTest);
            break;
        case 83: // S
            MoveDownAction.run(meleeTest);
            break;
        case 81: // Q
            MoveLeftAction.run(meleeTest);
            break;
        case 68: // D
            MoveRightAction.run(meleeTest);
            break;
    }
}
