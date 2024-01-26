
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

    addEntity(entity) {
        let x;
        let y;
       x = entity.xPosition;
       y = entity.yPosition;

        if(this.isValidePosition(x,y)) {
           let currentGrid = this.grid;
            currentGrid[y][x] = "M";
            this.grid = currentGrid;    
        }
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
        let cellWidth = width / this.width; // 'width' est la largeur du canvas p5.js
        let cellHeight = height / this.height; // 'height' est la hauteur du canvas p5.js
    
        for (let y = 0; y < this.height; y++) {
            for (let x = 0; x < this.width; x++) {
                let cell = this.grid[y][x];
    
                // Définir la couleur en fonction du type de cellule
                if (cell === 1) { // Obstacle
                    fill(150); // Couleur grise pour les obstacles
                } else if (cell === "P") { // Entité
                    fill(0, 255, 0); // Couleur verte pour les entités
                } else if (cell === "M") {
                    fill(255, 0, 0);
                }else{
                    fill(255); // Couleur blanche pour les cellules vides
                }
    
                // Dessiner la cellule
                rect(x * cellWidth, y * cellHeight, cellWidth, cellHeight);
            }
        }
    }
    
}

