
let mapTest;
mapTest = new Map(34, 25);

// nb tiles = 850
let tile = [];

for (let i = 1; i <= 124; i++) {
    tile[i] = new Tile(1);
}

for (let i = 125; i <= 850; i++) {
    tile[i] = new Tile(2);
}


mapTest.addObstacle(2, 12, tile[1]);
mapTest.addObstacle(3, 12, tile[2]);
mapTest.addObstacle(4, 12, tile[3]);
mapTest.addObstacle(5, 12, tile[4]);
mapTest.addObstacle(6, 12, tile[5]);
mapTest.addObstacle(7, 12, tile[6]);
mapTest.addObstacle(8, 12, tile[7]);
mapTest.addObstacle(9, 12, tile[8]);
mapTest.addObstacle(10, 12, tile[9]);
mapTest.addObstacle(10, 11, tile[10]);
mapTest.addObstacle(10, 10, tile[11]);
mapTest.addObstacle(10, 9, tile[12]);
mapTest.addObstacle(10, 8, tile[13]);
mapTest.addObstacle(10, 7, tile[14]);
mapTest.addObstacle(10, 6, tile[15]);
mapTest.addObstacle(11, 6, tile[16]);
mapTest.addObstacle(12, 6, tile[17]);
mapTest.addObstacle(13, 6, tile[18]);
mapTest.addObstacle(14, 6, tile[19]);
mapTest.addObstacle(15, 6, tile[20]);
mapTest.addObstacle(16, 6, tile[21]);
mapTest.addObstacle(17, 6, tile[22]);
mapTest.addObstacle(18, 6, tile[23]);
mapTest.addObstacle(19, 6, tile[24]);
mapTest.addObstacle(20, 6, tile[25]);
mapTest.addObstacle(21, 6, tile[26]);
mapTest.addObstacle(22, 6, tile[27]);
mapTest.addObstacle(23, 6, tile[28]);
mapTest.addObstacle(24, 6, tile[29]);
mapTest.addObstacle(25, 6, tile[30]);
mapTest.addObstacle(26, 6, tile[31]);
mapTest.addObstacle(27, 6, tile[32]);
mapTest.addObstacle(28, 6, tile[33]);
mapTest.addObstacle(29, 6, tile[34]);
mapTest.addObstacle(30, 6, tile[35]);
mapTest.addObstacle(31, 6, tile[36]);
mapTest.addObstacle(32, 6, tile[37]);
mapTest.addObstacle(33, 6, tile[38]);
mapTest.addObstacle(33, 7, tile[39]);
mapTest.addObstacle(33, 8, tile[40]);
mapTest.addObstacle(33, 9, tile[41]);
mapTest.addObstacle(33, 10, tile[42]);
mapTest.addObstacle(33, 11, tile[43]);
mapTest.addObstacle(33, 12, tile[44]);
mapTest.addObstacle(33, 13, tile[45]);
mapTest.addObstacle(33, 14, tile[46]);
mapTest.addObstacle(33, 15, tile[47]);
mapTest.addObstacle(33, 16, tile[48]);
mapTest.addObstacle(33, 17, tile[49]);
mapTest.addObstacle(33, 18, tile[50]);
mapTest.addObstacle(33, 19, tile[51]);
mapTest.addObstacle(32, 19, tile[52]);
mapTest.addObstacle(31, 19, tile[53]);
mapTest.addObstacle(30, 19, tile[54]);
mapTest.addObstacle(29, 19, tile[55]);
mapTest.addObstacle(28, 19, tile[56]);
mapTest.addObstacle(27, 19, tile[57]);
mapTest.addObstacle(26, 19, tile[58]);
mapTest.addObstacle(25, 19, tile[59]);
mapTest.addObstacle(25, 20, tile[60]);
mapTest.addObstacle(25, 21, tile[61]);
mapTest.addObstacle(25, 22, tile[62]);
mapTest.addObstacle(25, 23, tile[63]);
mapTest.addObstacle(25, 24, tile[64]);
mapTest.addObstacle(24, 24, tile[65]);
mapTest.addObstacle(23, 23, tile[66]);
mapTest.addObstacle(23, 22, tile[67]);
mapTest.addObstacle(23, 21, tile[68]);
mapTest.addObstacle(23, 20, tile[69]);
mapTest.addObstacle(23, 19, tile[70]);
mapTest.addObstacle(22, 19, tile[71]);
mapTest.addObstacle(21, 19, tile[72]);
mapTest.addObstacle(20, 19, tile[73]);
mapTest.addObstacle(19, 19, tile[74]);
mapTest.addObstacle(18, 19, tile[75]);
mapTest.addObstacle(18, 18, tile[76]);
mapTest.addObstacle(18, 17, tile[77]);
mapTest.addObstacle(18, 16, tile[78]);
mapTest.addObstacle(18, 15, tile[79]);
mapTest.addObstacle(18, 14, tile[80]);
mapTest.addObstacle(18, 13, tile[81]);
mapTest.addObstacle(18, 12, tile[82]);
mapTest.addObstacle(18, 11, tile[83]);
mapTest.addObstacle(18, 10, tile[84]);
mapTest.addObstacle(17, 10, tile[85]);
mapTest.addObstacle(16, 10, tile[86]);
mapTest.addObstacle(15, 10, tile[87]);
mapTest.addObstacle(14, 10, tile[88]);
mapTest.addObstacle(13, 10, tile[89]);
mapTest.addObstacle(13, 11, tile[90]);
mapTest.addObstacle(13, 12, tile[91]);
mapTest.addObstacle(13, 13, tile[92]);
mapTest.addObstacle(13, 14, tile[93]);
mapTest.addObstacle(13, 15, tile[94]);
mapTest.addObstacle(13, 16, tile[95]);
mapTest.addObstacle(13, 17, tile[96]);
mapTest.addObstacle(13, 18, tile[97]);
mapTest.addObstacle(13, 19, tile[98]);
mapTest.addObstacle(12, 19, tile[99]);
mapTest.addObstacle(11, 19, tile[100]);
mapTest.addObstacle(10, 19, tile[101]);
mapTest.addObstacle(9, 19, tile[102]);
mapTest.addObstacle(8, 19, tile[103]);
mapTest.addObstacle(7, 19, tile[104]);
mapTest.addObstacle(6, 19, tile[105]);
mapTest.addObstacle(6, 18, tile[106]);
mapTest.addObstacle(6, 17, tile[107]);
mapTest.addObstacle(6, 16, tile[108]);
mapTest.addObstacle(6, 15, tile[109]);
mapTest.addObstacle(6, 14, tile[110]);
mapTest.addObstacle(5, 14, tile[111]);
mapTest.addObstacle(4, 14, tile[112]);
mapTest.addObstacle(3, 14, tile[113]);
mapTest.addObstacle(2, 14, tile[114]);
mapTest.addObstacle(2, 13, tile[115]);
mapTest.addObstacle(8, 15, tile[116]);
mapTest.addObstacle(11, 14, tile[117]);
mapTest.addObstacle(11, 17, tile[118]);
mapTest.addObstacle(21, 15, tile[119]);
mapTest.addObstacle(22, 12, tile[120]);
mapTest.addObstacle(26, 12, tile[121]);
mapTest.addObstacle(29, 8, tile[122]);
mapTest.addObstacle(31, 15, tile[123]);
mapTest.addObstacle(23, 24, tile[124]);

mapTest.addRoad(4, 13, tile[125]);



function spritesTiles1() { 
    for (let i = 1; i <= 124; i++) {
        image(tile[i].sprite, (tile[i].xPosition * cellWidth), (tile[i].yPosition * cellHeight), cellWidth, cellHeight);
    }
   
}

function spritesTiles2() { 
    image(tile[125].sprite, (tile[125].xPosition * cellWidth), (tile[125].yPosition * cellHeight), cellWidth, cellHeight);
}



