
function init() {
	var model = new VerseSelectModel(biblebooks);
	var view = new VerseSelectView(document.body);
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
		let url = "https://www.familiezander.de/bibelverse/versliste.php?index=" + index + "&bid=" + value + "&bname=" + text;
		fetch(url).then(versliste => console.log(versliste), error => console.log(`Error: ${error.message}`));
	});
}
