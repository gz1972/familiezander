
function init() {
    initVerseSelect(document.body);
    initVersListe(document.body)
}

function initVerseSelect(domRootNode) {
	var model = new VerseSelectModel(biblebooks);
	var view = new VerseSelectView(domRootNode, "save_verse.php");
	var controller = new VerseSelectController(model, view);
	controller.bindInput(function(text) {
		console.log("handleInput(\"" + text + "\")");
		// TODO: evtl. Bibelstellensuche über php (z.B. "H", "Ho", ..., "Hoheslied 2")
		// siehe: https://javascript.info/call-apply-decorators#debounce-decorator
		// https://javascript.info/task/debounce
		// etwa so: debounce(loadFunc(text), 800);
	});
	controller.bindSelect(function(index, value, text) {
		console.log("handleSelect(" + index + ", " + value + ", \"" + text + "\"): \"" + biblebooks[index].bname + "\"");
		// TODO evtl. Bibelstellensuche über php (z.B. "Hoheslied")
		//let url = "https://www.familiezander.de/bibelverse/versliste.php?index=" + index + "&bid=" + value + "&bname=" + text;
		let url = "versliste.php?index=" + index + "&bid=" + value + "&bname=" + text;
		fetch(url).then(versliste => console.log(versliste), error => console.log(`Error: ${error.message}`)).catch(err => console.log(`Exception: ${err.message}`));
	});
    // controller.bindSubmit(function(text) { // funktioniert noch nicht, evtl. ist die form-action schneller oder höher priorisiert
	// 	console.log("handleSubmit(\"" + text + "\")");
    //     // TODO: Bibeltext raussuchen? oder im model?
    // });
}

function initVersListe(domRootNode) {
    // TODO: globale versliste userVerse zeichnen
    // Dummy:
    if (typeof userVerse == "object" && userVerse.length > 0) {
        let verslistdom = View.createElement("div", "userverse");
        userVerse.forEach(userVers => {
            let versdom = View.createElement("div", "uservers");
            versdom.innerText = userVers;
            View.appendChild(verslistdom, versdom);
        });
        View.appendChild(domRootNode, verslistdom);
    }
}

// TODO: Funktion zum Laden der ausgewählten Bibel (Tabelle User, Feld BibleId)