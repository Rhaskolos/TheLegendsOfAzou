
class MoveRightAction {

    static  run(entity) {
        let map;
        let x;
        let y;
        map = entity.map;

        let name = entity.name;
        x = entity.xPosition;
        y = entity.yPosition;
        
        let newX = (entity.xPosition + 1);

        entity.orientation = "right";

        if (!map.isObstacleAtPosition(newX, y) && !map.isMobAtPosition(newX, y) &&  !map.isPlayerAtPosition(newX, y) && map.isValidePosition(newX, y)) {
            map.cleanCase(x, y);

            entity.xPosition = newX;
            entity.yPosition = y;

            map.initializePlayerPosition(newX, y);

            console.log(name + " is moving right. " + name + " is looked at " + entity.orientation + " \n");
        } else {
            console.log(name + " is blocked by an obstacle and cannot move right. " + name + " is looked at " + entity.orientation + " \n");
        }
    }
}

