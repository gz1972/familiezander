/**
 * @class MenuView
 * 
 * Visual representation of the model.
 */
class MenuView {

    #rootnode;
    #action;
	/*
    #submitbtn;
    #window;
	#inputframe;
	#inputtext;
	*/
	
    constructor(rootnode, action) {
        this.#rootnode = rootnode;
        this.#action = action;
    }

    #drawMenu(menuitems) {
		
		// TODO: ab hier
		
		let centerbox = View.createElement("div", "centerbox");
		centerbox.id = "save-verse";
		
		let title = View.createElement("div", "title");
		title.innerText = "Bibelstelle Speichern";
		View.appendChild(centerbox, title);
		
		let verseform = View.createElement("form", "horizontal");
		verseform.name = "verseform";
        if (this.#hasAction()) {
		    verseform.action = this.#action;
		    verseform.method = "post";
        }
		View.appendChild(centerbox, verseform);
		
		this.#inputframe = View.createElement("div", "input-frame");
		this.#inputframe.id = "frame-verse";
		View.appendChild(verseform, this.#inputframe);
		
		let inputlabel = View.createElement("div", "input-label");
		inputlabel.innerText = "Die Bibelstelle";
		View.appendChild(this.#inputframe, inputlabel);
		
		this.#inputtext = View.createElement("input");
		this.#inputtext.type = "text";
		this.#inputtext.name = "verse";
		this.#inputtext.id = "input-verse";
		View.appendChild(this.#inputframe, this.#inputtext);
		
		let text = "";
		let _that = this;
		View.addEventHandler("input", this.#inputtext, function() {
			if (this.value && this.value.length > 0 && text.length == 0) {
				let len = this.value.length;
				for (let optIdx = 0; optIdx < select.length; optIdx++) {
					if (select[optIdx].innerText.toLowerCase().indexOf(this.value.toLowerCase()) != 0) {
						select[optIdx].style.display = "none";
					} else {
						select[optIdx].style.display = "block";
					}
				}
				select.style.display = "block";
			} else {
				select.style.display = "none";
			}
			if (this.value.length < text.length) {
				text = "";
			}
			_that.onInput(this.value);
		});
		
		let select = View.createElement("select", "select-verse");
		select.name = "verses";
		select.id = "verses";
		select.size = this.#config.dropdownSize;
		View.appendChild(this.#inputframe, select);
		select.style.display = "none";
		
		View.addEventHandler("change", select, function() {
			let selectedItem = this[this.selectedIndex];
			text = selectedItem.text;
			_that.#inputtext.value = text;
			select.style.display = "none";
			_that.onSelect(this.selectedIndex, selectedItem.value, text);
		});
		
		biblebooks.forEach(biblebook => {
			let option = View.createElement("option", "option-vers");
			option.value = biblebook.bnumber;
			option.innerText = biblebook.bname;
			View.appendChild(select, option);
		});
		
        // TODO: wenn this.#action leer ist, dann "normalen" Button bauen, dann brauche ich noch eine bindAction-Methode
        if (this.#hasAction()) {
            this.#submitbtn = View.createElement("input", "button");
            this.#submitbtn.type = "submit";
            this.#submitbtn.innerText = "Speichern";
            View.appendChild(verseform, this.#submitbtn);
            View.addEventHandler("click", this.#submitbtn, function (e) {
                this.onSubmit(e);
            });
        } else {
            this.#submitbtn = View.createElement("button", "button");
            this.#submitbtn.innerText = "Speichern";
            View.appendChild(verseform, this.#submitbtn);
            View.addEventHandler("click", this.#submitbtn, function (e) {
                this.onSubmit(e);
            });
        }
		
		View.addEventHandler("focus", this.#inputtext, function (e) {
			_that.#inputframe.classList.add("labelup");
		});
		View.addEventHandler("blur", this.#inputtext, function (e) {
			if(_that.#inputtext.value.length === 0) {
				_that.#inputframe.classList.remove("labelup");
			}
		});
		
		return centerbox;
    }

    onChanged(menuitems) {
		// TODO: prüfen, evtl. überarbeiten
        if (this.#window) {
            View.removeChildren(this.#window);
        } else {
            this.#window = View.createElement("div", "window");
            View.appendChild(this.#rootnode, this.#window);
        }
        View.appendChild(this.#window, this.#drawMenu(menuitems));
    }
	
	/*
	onInput() {};
	onSelect() {};
	onSubmit() {};

    bindInput(handler) {
        this.onInput = handler;
    }

    bindSelect(handler) {
        this.onSelect = handler;
    }

    bindSubmit(handler) {
        this.onSubmit = handler;
    }
	*/
}
