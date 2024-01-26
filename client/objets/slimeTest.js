
let slimeTest;

slimeTest = new Slime("Slime1");
slimeTest.xPosition = 27;
slimeTest.yPosition = 14;

mapTest.addEntity(slimeTest);

slimeTest.map = mapTest;

MovePatternAction.run(slimeTest,"LLLRRR");