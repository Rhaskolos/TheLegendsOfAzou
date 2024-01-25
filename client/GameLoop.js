

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
        console.log("-----------------------------------\n");
        console.log("Bienvenue dans \"The legend of Azou\"\n");
        while (this.isStarted()) {
            console.log("-----------------------------------\n\n");
            console.log("Actions possibles: " + Object.keys(this.actions).join(", ") + "\n");
            let userAction = prompt("Entrer une action : ");
            console.log("Action choisie: " + userAction + "\n\n");
            if (!this.actions.includes(userAction)) {
                console.log("Erreur, cette action n'est pas disponible.\n");
            } else {
                let state = this.state;
                let action = this.actions[userAction];
                this.action.run(state);
            }

        }

    }

    stop() {
        this.started = false;
    }

    registerAction(action) {
        let name = action.name;
        this.actions[name] = action;
        return this;
    }

    unregisterAction(action) {
        let name = action.name;
        if (!this.actions.includes(name)) {
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