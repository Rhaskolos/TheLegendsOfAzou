
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
        let cellWidth = width / this.width; // 'width' est la largeur du canvas p5.js
        let cellHeight = height / this.height; // 'height' est la hauteur du canvas p5.js
    
        for (let y = 0; y < this.height; y++) {
            for (let x = 0; x < this.width; x++) {
                let cell = this.grid[y][x];
    
                // Définir la couleur en fonction du type de cellule
                if (cell === true) { // Obstacle
                    fill(150); // Couleur grise pour les obstacles
                } else if (cell === "C") { // Entité
                    fill(0, 255, 0); // Couleur verte pour les entités
                } else {
                    fill(255); // Couleur blanche pour les cellules vides
                }
    
                // Dessiner la cellule
                rect(x * cellWidth, y * cellHeight, cellWidth, cellHeight);
            }
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
