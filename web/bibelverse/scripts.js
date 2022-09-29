
function init(frameId, inputId) {
	var frame = document.getElementById(frameId);
	var input = document.getElementById(inputId);
	if (input && frame) {
		input.addEventListener("focus", function (e) {
			frame.classList.add("labelup");
		});
		input.addEventListener("blur", function (e) {
			if(input.value.length === 0) {
				frame.classList.remove("labelup");
			}
		});
	}
}

