
class Map {

    grid;
    height;
    width;

    constructor(sizeX, sizeY){
        this.grid = (Array(sizeY).fill(null).map(() => Array (sizeX).fill(null)));
        this.height = sizeY;
        this.width = sizeX;
    }

    isValidePosition(x,y){

        return (y >= 0 && y < this.height && x >= 0 && x < this.width);
        
    }

    addObstacle(x,y,tile) {

        if(this.isValidePosition(x,y)) {
           let currentGrid = this.grid;
            currentGrid[y][x] = true;
            this.grid = currentGrid;
            tile.xPosition = x;
            tile.yPosition = y;
        }
    }

    isObstacleAtPosition(x,y) {

        return this.isValidePosition(x,y) && this.grid[y][x];
    }

    cleanCase(x,y) {

        if (this.isValidePosition(x,y)) {
            this.grid[y][x] = false;
        }
    }

    initializeEntityPosition(x,y){

        if (this.isValidePosition(x,y)) {
            this.grid[y][x] = "C";
        }
    }

    displayTable() {
        for (const row of this.grid) {
            for (const cell of row) {
                console.log(cell === true ? "1" : (cell === "c" ? "C" : "0") + " ");
            }
            console.log("\n");
        }
    }


    get grid(){

        return this.grid;
    }

    set grid(value){

        this.grid = value; 
    }

    get height(){

        return this.height;
    }

    set height(value){

        this.height = value;
    }

    get width() {

        return this.width;
    }

    set width(value) {

        this.width = value
    }
}

export default Map;
