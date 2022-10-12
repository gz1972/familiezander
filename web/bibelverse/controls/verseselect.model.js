/**
 * @class VerseSelectModel
 *
 * Manages the settings of the application.
 */
class VerseSelectModel {

    #biblebooks;

    constructor(biblebooks) {
        this.#biblebooks = biblebooks;
    }

    bindChanged(callback) {
        this.onChanged = callback;
        this.onChanged(this.#biblebooks);
    }
	
	onInput(text) {
		//console.log("onInput(\"" + text + "\")");
		this.handleInput(text);
	}
	
	onSelect(index, value, text) {
		//console.log("onSelect(" + index + ", " + value + ", \"" + text + "\")");
		this.handleSelect(index, value, text);
	}
	
	handleInput(text) {}
	handleSelect(index, value, text) {}
	
    bindInput(callback) {
        this.handleInput = callback;
    }
	
    bindSelect(callback) {
        this.handleSelect = callback;
    }
}
