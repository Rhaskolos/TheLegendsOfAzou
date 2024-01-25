
class MoveRightAction {

    get name() {
        return "MoveRight";
    }

    run(state) {

        entity = state.entity;
        map = state.map;

        let name = entity.name;
        let x = entity.xPosition;
        let y = entity.yPosition;
        
        let newX = (entity.xPosition + 1);

        entity.orientation = "right";

        if (!map.isObstacleAtPosition(newX, y) && map.isValidPosition(newX, y)) {
            map.cleanCase(x, y);

            entity.xPosition = newX;
            entity.yPosition = y;

            map.initializeEntityPosition(newX, y, entity.type);

            console.log(name + " is moving right. " + name + " is looked at " + entity.orientation + " \n");
        } else {
            console.log(name + " is blocked by an obstacle and cannot move right. " + name + " is looked at " + entity.orientation + " \n");
        }
    }
}

export default MoveRightAction;