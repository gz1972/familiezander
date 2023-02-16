function getVerseToday(liste, mapping, root) {
    if (liste.length != mapping.length) {
        console.error("liste has length of " + liste.length + " but mapping has length of " + mapping.length);
        return;
    }
    //var idx = getNextId(liste.length);
    var idx = getNextId(mapping);
    var verseDom = createVerseDom(liste[idx]);
    root.appendChild(verseDom);
}

function getNextId(mapping) {
    var start = new Date(2022, 8, 24);
    var numDays = numDaysSince(start);
    while (numDays >= mapping.length) {
        numDays -= mapping.length;
    }
    return mapping[numDays];

    //return Math.floor(Math.random() * length);
}

function numDaysSince(start) {
    var now = new Date();
    var diffMs = now.getTime() - start.getTime();
    var diffTage = Math.floor(diffMs / 86400000);
    return diffTage;
}

function createElement(type, className, text) {
    var elem = document.createElement(type);

    if (className) {
        elem.classList.add(className);
    }

    if (text) {
        var textNode = document.createTextNode(text);
        elem.appendChild(textNode);
    }

    return elem;
}

function createVerseDom(verse) {
    var verseFrame = createElement("div", "centerbox");
    verseFrame.appendChild(createElement("div", "title", verse.text));
    var subTitle = createElement("div", "sub-title");
    var link = createElement("a");
    link.target = "_blank";
    link.href = "https://www.bibleserver.com/LUT.ELB.HFA.GNB.NLB.Ne%C3%9C/" + verse.book + verse.chapter + "%2C" + verse.verse;
    link.innerText = verse.location;
    subTitle.appendChild(link);
    verseFrame.appendChild(subTitle);
    return verseFrame;
}

function toggleBtn(btn, className) {
	if (btn.className.indexOf("pressed") == -1) {
		btn.className += " pressed";
	} else {
		btn.className = className;
	}
}
