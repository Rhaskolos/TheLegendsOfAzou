
let slimeTest;

slimeTest = new Slime("Snoopy");
slimeTest.xPosition = 27;
slimeTest.yPosition = 14;

mapTest.initializeMobPosition(slimeTest.xPosition,slimeTest.yPosition);

slimeTest.map = mapTest;

 

function updateFrameSlimeTest() {
    let frameMovePattern = 120;
    if (frameCountMovePattern % frameMovePattern === 0) {
        MovePatternAction.run(slimeTest,"LLLRRR");
    }
    frameCountMovePattern++;

}