

class Tile {

    type;
    xPosition;
    yPosition;
    map;

    constructor(type) {
    this.type = type;
    }

    get type() {
        return this.type;
    }

    set type(value) {
        this.type = value;
    }

    get xPosition(){
        return this.xPosition;
    }

    set xPosition(value){
        this.xposition = value;
    }

    get yPosition(){
        return this.yPosition;
    }

    set yPosition(value){
        this.yposition = value;
    }

    get map(){
        return this.map;
    }

    set map(value){
        this.map = value;
    }
}

export default Tile;