/**
 * @class VerseSelectView
 * 
 * Siehe auch:
 * C:\Projekte\familiezander\Vergleichsprojekte\Bibelverse_www\components\view.js
 * C:\Projekte\familiezander\Vergleichsprojekte\Bibelverse_www\components\verse\verse.view.js
 * C:\Projekte\familiezander\Vergleichsprojekte\Bibelverse_www\components\verse\verse.view.start.js
 * C:\Projekte\familiezander\Vergleichsprojekte\Bibelverse_www\components\verse\verse.view.guess.js
 * C:\Projekte\familiezander\Vergleichsprojekte\Bibelverse_www\components\verse\verse.view.rate.js
 *
 * Visual representation of the model.
 */
class VerseSelectView {

    #rootnode;
    #window;
	#inputframe;
	#inputtext;
	
	#config = {
		dropdownSize: 5
	};
	
    constructor(rootnode) {
        this.#rootnode = rootnode;
    }

    #drawVerseSelect(biblebooks) {
		
		let centerbox = View.createElement("div", "centerbox");
		centerbox.id = "save-verse";
		
		let title = View.createElement("div", "title");
		title.innerText = "Bibelstelle Speichern";
		View.appendChild(centerbox, title);
		
		// let message = View.createElement("div", "message");
		// message.innerText = "Ein Fehler ist aufgetreten";
		// View.appendChild(centerbox, message);
		
		let verseform = View.createElement("form", "horizontal");
		verseform.name = "verseform";
		verseform.action = "save_verse.php";
		verseform.method = "post";
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
		
		let inputbutton = View.createElement("input", "button");
		inputbutton.type = "submit";
		inputbutton.innerText = "Speichern";
		View.appendChild(verseform, inputbutton);
		
		View.addEventHandler("focus", this.#inputtext, function (e) {
			_that.#inputframe.classList.add("labelup");
		});
		View.addEventHandler("blur", this.#inputtext, function (e) {
			if(_that.#inputtext.value.length === 0) {
				_that.#inputframe.classList.remove("labelup");
			}
		});
		
		return centerbox;

		// let dropdown = View.createElement("div", "dropdown");
		
		// let label = View.createElement("label");
		// label.for = "verse";
		// View.appendChild(dropdown, label);
		
		// let input = View.createElement("input");
		// input.type = "text";
		// input.id = "verse";
		// input.name = "verse";
		// View.appendChild(dropdown, input);
		
		// let text = "";
		// let _that = this;
		// View.addEventHandler("input", input, function() {
			// if (this.value && this.value.length > 0 && text.length == 0) {
				// let len = this.value.length;
				// for (let optIdx = 0; optIdx < select.length; optIdx++) {
					// if (select[optIdx].innerText.toLowerCase().indexOf(this.value.toLowerCase()) != 0) {
						// select[optIdx].style.display = "none";
					// } else {
						// select[optIdx].style.display = "block";
					// }
				// }
				// select.style.display = "block";
			// } else {
				// select.style.display = "none";
			// }
			// if (this.value.length < text.length) {
				// text = "";
			// }
			// _that.onInput(this.value);
		// });
		
		// let select = View.createElement("select");
		// select.name = "verses";
		// select.id = "verses";
		// select.size = this.#config.dropdownSize;
		// View.appendChild(dropdown, select);
		// select.style.display = "none";
		
		// View.addEventHandler("change", select, function() {
			// let selectedItem = this[this.selectedIndex];
			// text = selectedItem.text;
			// input.value = text;
			// select.style.display = "none";
			// _that.onSelect(this.selectedIndex, selectedItem.value, text);
		// });
		
		// biblebooks.forEach(biblebook => {
			// let option = View.createElement("option");
			// option.value = biblebook.bnumber;
			// option.innerText = biblebook.bname;
			// View.appendChild(select, option);
		// });
		
		// return dropdown;
    }

    onChanged(biblebooks) {
        if (this.#window) {
            View.removeChildren(this.#window);
        } else {
            this.#window = View.createElement("div", "window");
            View.appendChild(this.#rootnode, this.#window);
        }
        View.appendChild(this.#window, this.#drawVerseSelect(biblebooks));
    }
	
	onInput() {};
	onSelect() {};

    bindInput(handler) {
        this.onInput = handler;
    }

    bindSelect(handler) {
        this.onSelect = handler;
    }
}
/*
		<div class="dropdown">
			<label for="book">Buch:</label><br/>
			<input type="text" id="book" name="book"></input><br/>
			<select name="books" id="books" size="5">
			  <option value="1">1.Mose</option>
			  <option value="2">2.Mose</option>
			  <option value="3">3.Mose</option>
			  ...
			</select>
		</div>
*/