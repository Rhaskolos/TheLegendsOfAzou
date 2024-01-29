
let currentFrame = 0;
let y = 0;

let isMovingUp = false;
let isMovingDown = false;
let isMovingLeft = false;
let isMovingRight = false;

let frameCountUp = 0;
let frameCountDown = 0;
let frameCountLeft = 0;
let frameCountRight = 0;

function preload() {
    const spriteImageSlime = loadImage("../assets/slimeSprite.png");
    slimeTest.sprite = spriteImageSlime;
    
    const spriteImageMelee = loadImage("../assets/meleeSprite.png");
    meleeTest.sprite = spriteImageMelee;

    const spriteImageTile1 = loadImage("../assets/TileType1Sprite.png");
    tile1.sprite = spriteImageTile1;
}


function setup() {

    createCanvas(1200, 1200);
}

function draw() {


    mapTest.displayTable();
    updateFrameSlimeTest();
    if (slimeTest.sprite) {
        let cellWidth = 32;
        let cellHeight = 32;
    
        
        let pixelX = slimeTest.xPosition * cellWidth;
        let pixelY = slimeTest.yPosition * cellHeight;
    
        image(slimeTest.sprite, pixelX, pixelY, cellWidth, cellHeight);
    }

    if (meleeTest.sprite) {
        let cellWidth = 32;
        let cellHeight = 32;
    
    
        let pixelX = meleeTest.xPosition * cellWidth;
        let pixelY = meleeTest.yPosition * cellHeight;
    
        image(meleeTest.sprite, pixelX, pixelY, cellWidth, cellHeight);
    }

    if (tile1.sprite) {
        let cellWidth = 32;
        let cellHeight = 32;

        let pixelX = 2 * cellWidth;
        let pixelY = 12 * cellHeight; 
        
        image(tile1.sprite, pixelX, pixelY, cellWidth, cellHeight);
    }
    if (isMovingUp && frameCountUp++ % 15 === 0) {
        MoveUpAction.run(meleeTest);
    }
    if (isMovingDown && frameCountDown++ % 15 === 0) {
        MoveDownAction.run(meleeTest);
    }
    if (isMovingLeft && frameCountLeft++ % 15 === 0) {
        MoveLeftAction.run(meleeTest);
    }
    if (isMovingRight && frameCountRight++ % 15 === 0) {
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
            frameCountUp = 0;
            break;
        case 83: // S
            isMovingDown = false;
            frameCountDown = 0;
            break;
        case 81: // Q
            isMovingLeft = false;
            frameCountLeft = 0;
            break;
        case 68: // D
            isMovingRight = false;
            frameCountRight = 0;
            break;
    }
}

