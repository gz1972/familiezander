/**
 * @class View
 *
 * Basis functions for the Views.
 */
class View {
    //constructor() {
    //}

    // // 6x11
    // // ... 15x10
    // static createSelectBox(items, onSelect, onAbort) {
    //     if (!items || !items.length) {
    //         throw new Error("No items given");
    //     }

	// 	let configlist = [
	// 		{ maxnum:   5, size: { x:  1, y:  5 } },
	// 		{ maxnum:  10, size: { x:  2, y:  5 } },
	// 		{ maxnum:  20, size: { x:  2, y: 10 } },
	// 		{ maxnum:  30, size: { x:  3, y: 10 } },
	// 		{ maxnum:  40, size: { x:  4, y: 10 } },
	// 		{ maxnum:  50, size: { x:  5, y: 10 } },
	// 		{ maxnum:  60, size: { x:  6, y: 10 } },
	// 		{ maxnum:  66, size: { x:  6, y: 11 } },
	// 		{ maxnum:  72, size: { x:  6, y: 12 } },
	// 		{ maxnum:  84, size: { x:  7, y: 12 } },
	// 		{ maxnum:  96, size: { x:  8, y: 12 } },
	// 		{ maxnum: 120, size: { x:  8, y: 15 } },
	// 		{ maxnum: 135, size: { x:  9, y: 15 } },
	// 		{ maxnum: 150, size: { x: 10, y: 15 } }
	// 	];
    //     let config = configlist.find(c => items.length <= c.maxnum);
    //     if (!config) {
    //         throw new Error(`No config found for ${items.length} items`);
    //     }
        
    //     let wnd = View.createElement("div", "selectwnd");
    //     View.appendChild(app.rootnode, wnd);

    //     let list = View.createElement("div", `selectlist numcols_${config.size.x} numrows_${config.size.y}`);
    //     View.appendChild(wnd, list);

    //     items.forEach(item => {
    //         let elem = View.createElement("div", "selectbtn");
    //         let text = View.createElement("div", "text" + (item.className ? " " + item.className : ""));
    //         text.innerText = item.text;
    //         View.appendChild(elem, text);
    //         View.appendChild(list, elem);
    //     });
    //     View.addClickHandler(list, function (e) {
    //         let elem = e.target;
    //         app.rootnode.removeChild(wnd);
    //         if (elem.className != "selectbtn") {
    //             elem = elem.parentElement;
    //         }
    //         if (elem.className == "selectbtn") {
    //             onSelect(e.target.innerText);
    //         } else {
    //             onAbort(e.target.innerText);
    //         }
    //     });
    // }

    // static createVersPropertyBox(vers, titletext, onSave, onAbort, saveText = "Speichern", abortText = "Abbrechen") {
        
    //     let overlay = View.createElement("div", "msgoverlay");
    //     View.appendChild(app.rootnode, overlay);

    //     let settingwindow = View.createElement("div", "msgwindow");
    //     View.appendChild(overlay, settingwindow);

    //     let title = View.createElement("div", "title");
    //     title.innerText = titletext;
    //     View.appendChild(settingwindow, title);

    //     let content = View.createElement("div", "msgcontent");
    //     View.appendChild(settingwindow, content);

    //     //let versLocation = View.createElement("div", "title");
    //     //versLocation.innerText = vers ? `${vers.location} (${vers.bible})` : " ... (location) ...";
    //     //View.appendChild(content, versLocation);

    //     let _this = this;
    //     let versLocation = View.createElement("input", "inputvers");
    //     versLocation.setAttribute("type", "text");
    //     versLocation.value = vers ? vers.location : ""; //  (${vers.bible})
    //     //versLocation.addEventListener("input", function(event) { // evtl. über timer steuern
    //     //    _this.handleInput(event.target.value);
    //     //});
    //     View.appendChild(content, versLocation);

    //     let versText = View.createElement("div", "text");
    //     versText.innerText = vers && vers.text ? vers.text : " ... (text) ...";
    //     View.appendChild(content, versText);

    //     // TODO: Tags, Liste, ...

    //     let dlgbuttonbar = View.createElement("div", "msgbuttonbar");
    //     View.appendChild(settingwindow, dlgbuttonbar);

    //     let abortButton = View.createButton("msgbutton", "btnAbort", abortText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onAbort();
    //     });
    //     View.appendChild(dlgbuttonbar, abortButton);

    //     let saveButton = View.createButton("msgbutton", "btnSave", saveText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onSave(versLocation.value);
    //     });
    //     View.appendChild(dlgbuttonbar, saveButton);
    // }

    // static createOkBox(titletext, contenttext, onOk, okText = "Ok") {
    //     let overlay = View.createElement("div", "msgoverlay");
    //     View.appendChild(app.rootnode, overlay);

    //     let settingwindow = View.createElement("div", "msgwindow");
    //     View.appendChild(overlay, settingwindow);

    //     let title = View.createElement("div", "title");
    //     title.innerText = titletext;
    //     View.appendChild(settingwindow, title);

    //     let content = View.createElement("div", "msgcontent");
    //     content.innerText = contenttext;
    //     View.appendChild(settingwindow, content);

    //     let dlgbuttonbar = View.createElement("div", "msgbuttonbar");
    //     View.appendChild(settingwindow, dlgbuttonbar);

    //     let okButton = View.createButton("msgbutton", "btnOk", okText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onOk();
    //     });
    //     View.appendChild(dlgbuttonbar, okButton);
    // }

    // static createYesNoBox(titletext, contenttext, onYes, onNo, yesText = "Ja", noText = "Nein") {
    //     let overlay = View.createElement("div", "msgoverlay");
    //     View.appendChild(app.rootnode, overlay);

    //     let settingwindow = View.createElement("div", "msgwindow");
    //     View.appendChild(overlay, settingwindow);

    //     let title = View.createElement("div", "title");
    //     title.innerText = titletext;
    //     View.appendChild(settingwindow, title);

    //     let content = View.createElement("div", "msgcontent");
    //     content.innerText = contenttext;
    //     View.appendChild(settingwindow, content);

    //     let dlgbuttonbar = View.createElement("div", "msgbuttonbar");
    //     View.appendChild(settingwindow, dlgbuttonbar);

    //     let noButton = View.createButton("msgbutton", "btnNo", noText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onNo();
    //     });
    //     View.appendChild(dlgbuttonbar, noButton);

    //     let yesButton = View.createButton("msgbutton", "btnYes", yesText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onYes();
    //     });
    //     View.appendChild(dlgbuttonbar, yesButton);
    // }

    // static createYesNoCancelBox(titletext, contenttext, onYes, onNo, onCancel, yesText = "Ja", noText = "Nein", cancelText = "Abbrechen") {
    //     let overlay = View.createElement("div", "msgoverlay");
    //     View.appendChild(app.rootnode, overlay);

    //     let settingwindow = View.createElement("div", "msgwindow");
    //     View.appendChild(overlay, settingwindow);

    //     let title = View.createElement("div", "title");
    //     title.innerText = titletext;
    //     View.appendChild(settingwindow, title);

    //     let content = View.createElement("div", "msgcontent");
    //     content.innerText = contenttext;
    //     View.appendChild(settingwindow, content);

    //     let dlgbuttonbar = View.createElement("div", "msgbuttonbar");
    //     View.appendChild(settingwindow, dlgbuttonbar);

    //     let cancelButton = View.createButton("msgbutton", "btnCancel", cancelText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onCancel();
    //     });
    //     View.appendChild(dlgbuttonbar, cancelButton);

    //     let noButton = View.createButton("msgbutton", "btnNo", noText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onNo();
    //     });
    //     View.appendChild(dlgbuttonbar, noButton);

    //     let yesButton = View.createButton("msgbutton", "btnYes", yesText, function () {
    //         app.rootnode.removeChild(overlay);
    //         onYes();
    //     });
    //     View.appendChild(dlgbuttonbar, yesButton);
    // }

    // static createCard(verseData, verseIdText, verseStatisticText, versaeStatisticElement = null) {
    //     var verse = View.createElement("div", "verse");
    //     var card = View.createElement("div", "verse-card");
    //     if (verseIdText) {
    //         View.appendChild(card, View.createCardItem("verse-card-num", verseIdText));
    //     }
    //     View.appendChild(card, View.createCardItem("verse-card-book", verseData.bible));
    //     View.appendChild(card, View.createCardItem("verse-card-title", verseData.location));
    //     View.appendChild(card, View.createCardItem("verse-card-text", verseData.text));
    //     if (verseStatisticText) {
    //         View.appendChild(card, View.createCardItem("verse-card-statistics", verseStatisticText));
    //     }
    //     if (versaeStatisticElement) {
    //         View.appendChild(card, versaeStatisticElement);
    //     }
    //     View.appendChild(verse, card);
    //     return verse;
    // }

    // static createCardItem(className, innerText) {
    //     var cardItem = View.createElement("div", className);
    //     var cardText = View.createElement("div", "text");
    //     if (innerText) {
    //         cardText.innerText = innerText;
    //     }
    //     View.appendChild(cardItem, cardText);
    //     return cardItem;
    // }

    // static createButton(btnclass, btnid, elemtext, handler) {
    //     var btn = View.createElement("button", btnclass);
    //     btn.setAttribute("type", "button");
    //     btn.setAttribute("id", btnid);
    //     btn.innerText = elemtext;
    //     btn.addEventListener('click', event => {
    //         handler(event);
    //     })
    //     return btn;
    // }

    static createElement(tag, className) {
        const element = document.createElement(tag)
        if (className) {
            className.split(" ").forEach(cls => {
                element.classList.add(cls)
            })
        }
        return element
    }

    // static getElement(selector) {
    //     const element = document.querySelector(selector)
    //     return element
    // }

    static appendChild(parent, child) {
        if (View.isDomElementValid(parent) && View.isDomElementValid(child)) {
            parent.appendChild(child);
        }
    }

	 static isDomElementValid (obj) {
		if (!obj) {
			return false;
		}
		if (typeof(obj.firstChild) === "undefined" || typeof(obj.lastChild) === "undefined") {
		    return false;
		}
		if (typeof(obj.previousSibling) === "undefined" || typeof(obj.nextSibling) === "undefined") {
			return false;
		}
		return true;
    }
    
    // static setAttribute(elem, attrName, attrValue) {
    //     elem.setAttribute(attrName, attrValue);
    // }

    // static addClickHandler(elem, handlerFunction) {
    //     View.addEventHandler("click", elem, handlerFunction);
    // }

    static addEventHandler(eventName, elem, handlerFunction) {
        if (View.isDomElementValid(elem) && typeof handlerFunction === "function") {
            elem.addEventListener(eventName, handlerFunction, false);
        }
    }

    // static addElementClassName (elem, className) {
    //     if (!elem || !className || className.length === 0) return;
    //     if (!elem.className || elem.className.length === 0) {
    //         elem.className = className;
    //     } else {
    //         if (elem.className.indexOf(className) === -1) {
    //             // füge nur hinzu, wenn noch nicht da
    //             elem.className += " " + className;
    //         }
    //     }
    // }

    // // entfernt den angegebenen Bezeichner aus dem className des Elements
    // static removeElementClassName(elem, className) {
    //     if (!elem || !elem.className || elem.className.length === 0 || !className || className.length === 0) {
    //         return;
    //     }
    //     elem.className = elem.className.split(" ").filter(function (elem) {
    //         return elem !== className;
    //     }).join(" ");
    // }

    // static toggleElementClassName(elem, className) {
    //     if (!elem || !elem.className || elem.className.length === 0 || !className || className.length === 0) {
    //         return;
    //     }
    //     if (elem.className.indexOf(className) === -1) {
    //         View.addElementClassName(elem, className);
    //     } else {
    //         View.removeElementClassName(elem, className);
    //     }
    // }

    // static removeChildren(elem) {
    //     if (elem.hasChildNodes()) {
    //         while (elem.firstChild) {
    //             elem.removeChild(elem.firstChild);
    //         }
    //     }
    // }

    // static createUUID () {
    //     // http://stackoverflow.com/questions/105034/how-to-create-a-guid-uuid-in-javascript
    //     var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    //         var r = Math.random()*16|0,v=c=='x'?r:r&0x3|0x8;
    //         return v.toString(16);
    //     });
    //     return uuid;
    // }
}
