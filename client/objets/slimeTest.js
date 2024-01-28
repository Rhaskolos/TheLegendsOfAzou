
let slimeTest;

slimeTest = new Slime("Slime1");
slimeTest.xPosition = 27;
slimeTest.yPosition = 14;

mapTest.initializeMobPosition(slimeTest.xPosition,slimeTest.yPosition);

slimeTest.map = mapTest;


function updateFrameSlimeTest() {
    let frameMovePattern = 120;
    if (currentFrame % frameMovePattern === 0) {
        MovePatternAction.run(slimeTest,"LLLRRR");
    }
    currentFrame++;

}