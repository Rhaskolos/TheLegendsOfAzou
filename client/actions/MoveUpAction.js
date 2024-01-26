


class MoveUpAction {


    static run(entity) {
        let map;
        let x;
        let y;
        map = entity.map;

        let name = entity.name;
        x = entity.xPosition;
        y = entity.yPosition;

        let newY = (entity.yPosition - 1);

        entity.orientation = "up";

        if (!map.isObstacleAtPosition(x, newY) && map.isValidePosition(x, newY)) {
            map.cleanCase(x, y);

            entity.xPosition = x;
            entity.yPosition = newY;

            map.initializeEntityPosition(x, newY);

            console.log(name + " is moving up. " + name + " is looked at " + entity.orientation + " \n");
        } else {
            console.log(name + " is blocked by an obstacle and cannot move up. " + name + " is looked at " + entity.orientation + " \n");
        }
    }
}

