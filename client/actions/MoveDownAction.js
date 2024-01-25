


class MoveDownAction {

    get name() {
        return "MoveDown";
    }

    run(state) {

        entity = state.entity;
        map = state.map;

        let name = entity.name;
        let x = entity.xPosition;
        let y = entity.yPosition;

        let newY = (entity.yPosition + 1);

        entity.orientation = "down";

        if (!map.isObstacleAtPosition(x, newY) && map.isValidPosition(x, newY)) {
            map.cleanCase(x, y);

            entity.xPosition = x;
            entity.yPosition = newY;

            map.initializeEntityPosition(x, newY, entity.type);

            console.log(name + " is moving down. " + name + " is looked at " + entity.orientation + " \n");
        } else {
            console.log(name + " is blocked by an obstacle and cannot move down. " + name + " is looked at " + entity.orientation + " \n");
        }
    }
}

export default MoveDownAction;