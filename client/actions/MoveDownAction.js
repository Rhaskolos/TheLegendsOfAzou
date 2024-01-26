


class MoveDownAction {

    static  run(entity) {
        let map;
        let x;
        let y;
        map = entity.map;

        let name = entity.name;
        x = entity.xPosition;
        y = entity.yPosition;

        let newY = (entity.yPosition + 1);

        entity.orientation = "down";

        if (!map.isObstacleAtPosition(x, newY) && map.isValidePosition(x, newY)) {
            map.cleanCase(x, y);

            entity.xPosition = x;
            entity.yPosition = newY;

            map.initializeEntityPosition(entity.xPosition,entity.yPosition);

            console.log(name + " is moving down. " + name + " is looked at " + entity.orientation + " \n");
        } else {
            console.log(name + " is blocked by an obstacle and cannot move down. " + name + " is looked at " + entity.orientation + " \n");
        }
    }
}

