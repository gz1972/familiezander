/**
 * @class MenuController
 *
 * Links the user input and the view output.
 *
 * @param model
 * @param view
 */
class MenuController {
    constructor(model, view) {
        this.model = model;
        this.view  = view;
	    
        // Explicit this binding
        this.model.bindChanged(this.onChanged);

		/*
		this.view.bindInput(this.handleInput);
        this.view.bindSelect(this.handleSelect);
        this.view.bindSubmit(this.handleSubmit);
		*/
    }
    
    onChanged = (menuitems) => {
        this.view.onChanged(menuitems);
    }
	
	/*
	handleInput = (text) => {
        this.model.onInput(text);
    }

    handleSelect = (index, value, text) => {
        this.model.onSelect(index, value, text);
    }
	
    handleSubmit = (e) => {
        this.model.onSubmit(e);
    }
	
    bindInput(callback) {
        this.model.bindInput(callback);
    }
	
    bindSelect(callback) {
        this.model.bindSelect(callback);
    }
	
    bindSubmit(callback) {
        this.model.bindSubmit(callback);
    }
	*/
}
