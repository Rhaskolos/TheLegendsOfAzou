
function preload() {
    const spriteImageSlime = loadImage("../assets/slimeSprite.png");
    slimeTest.sprite = spriteImageSlime;

    const spriteImageMelee = loadImage("../assets/meleeSprite.png");
    meleeTest.sprite = spriteImageMelee;



    const spriteImageTile1 = loadImage("../assets/TileType1Sprite.png");
    for (let i = 1; i <= 124; i++) {
        tile[i].sprite = spriteImageTile1;
    }

    const spriteImageTile2 = loadImage("../assets/TileType4Sprite.png");
    tile[125].sprite = spriteImageTile2;

    
}

function setup() {

    createCanvas(1100, 1100);
}

function draw() {

   
    mapTest.renderTile();
    
    mapTest. renderEntity();
    
    updateFrameSlimeTest();


    if (isMovingUp && frameCountMovePlayer++ % 15 === 0) {
        MoveUpAction.run(meleeTest);
    }
    if (isMovingDown && frameCountMovePlayer++ % 15 === 0) {
        MoveDownAction.run(meleeTest);
    }
    if (isMovingLeft && frameCountMovePlayer++ % 15 === 0) {
        MoveLeftAction.run(meleeTest);
    }
    if (isMovingRight && frameCountMovePlayer++ % 15 === 0) {
        MoveRightAction.run(meleeTest);
    }
}

function keyPressed() {
    switch (keyCode) {
        case 90: // Z
            isMovingUp = true;
            break;
        case 83: // S
            isMovingDown = true;
            break;
        case 81: // Q
            isMovingLeft = true;
            break;
        case 68: // D
            isMovingRight = true;
            break;
    }
}

function keyReleased() {
    switch (keyCode) {
        case 90: // Z
            isMovingUp = false;
            frameCountMovePlayer = 0;
            break;
        case 83: // S
            isMovingDown = false;
            frameCountMovePlayer = 0;
            break;
        case 81: // Q
            isMovingLeft = false;
            frameCountMovePlayer = 0;
            break;
        case 68: // D
            isMovingRight = false;
            frameCountMovePlayer = 0;
            break;
    }
}

