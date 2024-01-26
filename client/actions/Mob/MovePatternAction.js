
class MovePatternAction {
    static async run(entity, string) {
        let i = 1;
        let y = 0;

        while (i === 1) {
            for (y = 0; y < string.length; y++) {
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
                // Attendez 2 secondes avant de continuer
                await new Promise(resolve => setTimeout(resolve, 2000));
            }
            y = 0;
        }
    }
}
