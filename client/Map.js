
class Map {

    grid;
    height;
    width;

    constructor(sizeX, sizeY){
        this.grid = (Array(sizeY).fill(0).map(() => Array (sizeX).fill(0)));
        this.height = sizeY;
        this.width = sizeX;
    }

    isValidePosition(x, y) {
        return y >= 0 && y < this.height && x >= 0 && x < this.width;
    }
    

    addObstacle(x,y,tile) {

        if(this.isValidePosition(x,y)) {
           let currentGrid = this.grid;
            currentGrid[y][x] = 1;
            this.grid = currentGrid;
            tile.xPosition = x;
            tile.yPosition = y;
        }
    }

    isObstacleAtPosition(x, y) {
        return this.isValidePosition(x, y) && this.grid[y][x] === 1;
    }


    isMobAtPosition(x, y) {
        return this.isValidePosition(x, y) && this.grid[y][x] === "M";
    }

    initializeMobPosition(x, y) {
        if (this.isValidePosition(x, y)) { 
            this.grid[y][x] = "M";
        }
    }


    cleanCase(x,y) {

        if (this.isValidePosition(x,y)) {
            this.grid[y][x] = 0;
        }
    }

    initializePlayerPosition(x, y) {
        if (this.isValidePosition(x, y)) { 
            this.grid[y][x] = "P";
        }
    }

    isPlayerAtPosition(x, y) {
        return this.isValidePosition(x, y) && this.grid[y][x] === "P";
    }

    displayTable() {
        let cellWidth = 32;
        let cellHeight = 32;

        for (let y = 0; y < this.height; y++) {
            for (let x = 0; x < this.width; x++) {
                let cell = this.grid[y][x];

                if (cell === 1) { // Obstacle
                    fill(150); // Couleur grise pour les obstacles
                }else{
                    fill(255); // Couleur blanche pour les cellules vides
                }
    
                // Dessiner la cellule
                rect(x * cellWidth, y * cellHeight, cellWidth, cellHeight);
            }
        }
    }
    
}

