/**
 * @class VerseSelectModel
 *
 * Manages the settings of the application.
 */
class VerseSelectModel {

    #biblebooks;
    #text;

    constructor(biblebooks) {
        this.#biblebooks = biblebooks;
    }

    bindChanged(callback) {
        this.onChanged = callback;
        this.onChanged(this.#biblebooks);
    }
	
	onInput(text) {
		//console.log("onInput(\"" + text + "\")");
        this.#text = text;
		this.handleInput(text);
	}
	
	onSelect(index, value, text) {
		//console.log("onSelect(" + index + ", " + value + ", \"" + text + "\")");
        this.#text = text;
		this.handleSelect(index, value, text);
	}
	
	onSubmit(e) {
		//console.log("onSubmit()");
		this.handleSubmit(this.#text);
	}
	
	handleInput(text) {}
	handleSelect(index, value, text) {}
    handleSubmit() {}
	
    bindInput(callback) {
        this.handleInput = callback;
    }
	
    bindSelect(callback) {
        this.handleSelect = callback;
    }
	
    bindSubmit(callback) {
        this.handleSubmit = callback;
    }
}
