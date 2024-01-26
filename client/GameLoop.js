

class GameLoop {

    state;
    started;
    actions;

    constructor(state) {
        this.state = state
        this.started = false
        this.actions = []

    }

    start() {
        this.started = true;
    }
    
    keyPressed() {
        if (!this.started) return;
    
        let userAction;
        switch(keyCode) {
            case 90: // Z
                userAction = "up";
                break;
            case 83: // S
                userAction = "down";
                break;
            case 81: // Q
                userAction = "left";
                break;
            case 68: // D
                userAction = "right";
                break;
        }
    
        if (userAction && this.actions[userAction]) {
            let state = this.state;
            let action = this.actions[userAction];
            action.run(state);
        } else {
            console.log("Erreur, cette action n'est pas disponible.\n");
        }
    }

    registerAction(action) {
        let name = action.name;
        this.actions[name] = action;
        return this;
    }

    unregisterAction(action) {
        let name = action.name;
        if (!this.actions[name]) {
            throw new GameException("Action " + name + " does not exists");
        }
        delete (this.actions[name]);
        return this;
    }

    isStarted() {
        return this.started;
    }

    set started(value) {
        this.started = value;
        return this;
    }

    get actions() {
        return this.actions;
    }

    set actions(value) {

        this.actions = value;
        return this;
    }

    get state() {

        return this.state;
    }

    set state(value) {

        this.state = value;
        return this;
    }

}

export default GameLoop;