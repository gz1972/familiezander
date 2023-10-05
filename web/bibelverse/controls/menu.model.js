/**
 * @class MenuModel
 *
 * Manages the settings of the application.
 */
class MenuModel {

    #menuitems = [{
		text: "Google",
		url: "http://www.google.de/"
	}};

    constructor(menuitems) {
		if (menuitems && menuitems.length > 0) {
			this.#menuitems = menuitems;
		}
    }

    bindChanged(callback) {
        this.onChanged = callback;
        this.onChanged(this.#menuitems);
    }
	
	/*
	onInput(text) {
        this.#text = text;
		this.handleInput(text);
	}
	
	onSelect(index, value, text) {
        this.#text = text;
		this.handleSelect(index, value, text);
	}
	
	onSubmit(e) {
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
	*/
}
