function getVerseToday(liste) {
    var idx = getNextId(liste.length);
    var verseDom = createVerseDom(liste[idx]);
    document.body.appendChild(verseDom);
}

function getNextId(length) {
    //var now = new Date();
    //var start = now.getFullYear() * 10000 + ((now.getMonth() + 1) * 100) + now.getDate();

    return Math.floor(Math.random() * length);
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
    var verseFrame = createElement("div", "the-box");
    verseFrame.appendChild(createElement("div", "the-title", verse.text));
    var subTitle = createElement("div", "sub-title");
    var link = createElement("a");
    link.target = "_blank";
    link.href = "https://www.bibleserver.com/NLB/" + verse.book + verse.chapter + "%2C" + verse.verse;
    link.innerText = verse.location;
    subTitle.appendChild(link);
    verseFrame.appendChild(subTitle);
    return verseFrame;
}
