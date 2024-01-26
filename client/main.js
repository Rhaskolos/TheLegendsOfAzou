
function setup() {

    createCanvas(900, 900);
}

function draw() {
   

    mapTest.displayTable();

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
