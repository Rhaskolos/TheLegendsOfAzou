

class MovePatternAction {

    static async run(entity, string) {
        if (y < string.length) {
            switch (string[y]) {
                case "R":
                    MoveRightMobAction.run(entity);
                    break;
                case "L":
                    MoveLeftMobAction.run(entity);
                    break;
                case "U":
                    MoveUpMobAction.run(entity);
                    break;
                case "D":
                    MoveDownMobAction.run(entity);
                    break;
                default:
                    break;
            }
            y++;

        } else {
            y = 0;
        }
    }
}
