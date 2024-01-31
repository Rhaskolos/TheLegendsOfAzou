
let meleeTest;

meleeTest = new Melee("Azou");
meleeTest.xPosition = 3;
meleeTest.yPosition = 13;
meleeTest.map = mapTest;

mapTest.initializePlayerPosition(meleeTest.xPosition, meleeTest.yPosition);