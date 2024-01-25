
class StopAction {

    get name() {
        return "stop";
    }

    run(state) {
        loop = state.gameLoop;
        loop.stop();
        console.log("Au revoir...\n");
    }
}

export default StopAction;