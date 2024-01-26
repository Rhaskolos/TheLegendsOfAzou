
class GameState {

    entity;
    tile;
    map;
  

    constructor(entity,map){
        this.entity = entity;
        this.map = map;
    }

    get entity(){
        return this.entity;
    }

    set entity(value){
        this.entity = value;
        return this;
    }

    get tile(){
        return this.tile;
    }

    set tile(value){

        this.tile = value;
        return this;
    }

    get map(){
        return this.map;
    }

    set map(value){
        this.map = value;
        return this;
    }

    get gameLoop() {
        return this.gameLoop;
    }

    set gameLoop(value){
        this.gameLoop = value;
        return this;
    }

}

export default GameState;