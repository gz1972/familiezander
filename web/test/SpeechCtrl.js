//---------------------------------------------------------------------------------------
// JavaScript Document SpeechCtrl.js

/**
 * Kapselt die Spracherkennungs-Schnittstelle in iOS.
 * @constructor
 * @this {SpeechCtrl}
 */
var SpeechCtrl = function () {

    // Hilfsvariable für Event-Handler
    var _that = this;

    var _grammar = [];

    var _callback = function (type, result) { }
	
    var _speechRecognition = null;

    var _recognitionRunning = false;

    //
    // ----------------------------------------------------------
    //            Schnittstellenfunktionen (public)
    // ----------------------------------------------------------
    //

    this.init = function (vitalwerte) {
        logfunc("SpeechCtrl.init()");
        if (!this.isRecognitionAvailable()) {
            throw new Error("Speech Recognition Not Available");
        }
        _grammar = getGrammar(vitalwerte);
        initRecognition();
    };

    this.setCallback = function (callback) {
        logfunc("SpeechCtrl.setCallback()");
        if (typeof callback == "function") {
            _callback = callback;
        }
    };

    this.isRecognitionAvailable = function () {
        return "webkitSpeechRecognition" in window;
    };

    this.isRecognitionRunning = function () {
        return _recognitionRunning;
    };

    this.startRecognition = function (cbStarted) {
        logfunc("SpeechCtrl.startRecognition()");
        if (_speechRecognition && !_recognitionRunning) {
            logfunc("start recognition"); // 1
            _speechRecognition.start();
            logfunc("recognition started"); // 1
            _recognitionRunning = true;
			if (typeof cbStarted == "function") {
				cbStarted();
			}
        }
    };

    this.stopRecognition = function (cbStopped) {
        logfunc("SpeechCtrl.stopRecognition()");
       if (_speechRecognition && _recognitionRunning) {
            logfunc("stop recognition");
            setTimeout(function () {
                _speechRecognition.stop();
                logfunc("recognition stopped");
                _recognitionRunning = false;
				if (typeof cbStopped == "function") {
					cbStopped();
				}
            }, 250);
        }
    };

    this.toggleRecognition = function (cbToggled) {
        logfunc("SpeechCtrl.toggleRecognition()");
        if (_recognitionRunning) {
            this.stopRecognition(cbToggled);
        } else {
            this.startRecognition(cbToggled);
        }
    };
	
	this.debugCheckVitalSigns = function (aString) {
		checkVitalSigns(aString);
	}

    //
    // ----------------------------------------------------------
    //               interne Funktionen (private)
    // ----------------------------------------------------------
    //
    function logfunc(text1, text2, text3) {
        var text = "";
        if (text1) text += text1;
        if (text2) text += ", " + text2;
        if (text3) text += ", " + text3;
        if (typeof text1 == "string") {
            //clientStatusLog(text);
			var logElem = document.getElementById("log");
			if (logElem) {
				logElem.innerText += text + "\r\n";
			}
        }
    }

	function getGrammar(vitalwerte) {
		var grammar = [];
		vitalwerte.forEach(function (vitalwert) {
			var item = {
				label: vitalwert.bezeichnung.split(' ')[0].toLowerCase(),
				numberOfValues: vitalwert.werte.wert.length,
				values: []
			};
			vitalwert.werte.wert.forEach(function (wert) {
				item.values.push(wert.bezeichnung);
			});
			//logfunc(item.label + ": " + item.values[0]);
			grammar.push(item);
		});
		return grammar;
	}

    var beep = (function () {
        var ctxClass = window.audioContext || window.AudioContext || window.AudioContext || window.webkitAudioContext;
        var ctx = new ctxClass();
        return function (duration, type, finishedCallback) {

            duration = +duration;

            // Only 0-4 are valid types.
            type = (type % 5) || 0;

            if (typeof finishedCallback != "function") {
                finishedCallback = function () { };
            }

            var osc = ctx.createOscillator();

            osc.type = type;
            //osc.type = "sine";

            osc.connect(ctx.destination);
            if (osc.noteOn) osc.noteOn(0);
            if (osc.start) osc.start();

            setTimeout(function () {
                if (osc.noteOff) osc.noteOff(0);
                if (osc.stop) osc.stop();
                finishedCallback();
            }, duration);

        };
    })();

    function initRecognition() {
        // Initialize webkitSpeechRecognition
        _speechRecognition = new webkitSpeechRecognition();

        // String for the Final Transcript
        var final_transcript = "";

        // Set the properties for the Speech Recognition object
        _speechRecognition.continuous = true;
        _speechRecognition.interimResults = true;
        _speechRecognition.lang = 'de-DE';
        _speechRecognition.maxAlternatives = 1;

        // Callback Function for the onStart Event
        _speechRecognition.onstart = function (e) {
            logfunc('onstart', e); // 2
            _callback("onstart");
        };
        _speechRecognition.onerror = function (e) {
            logfunc('onerror', e.error);
            _callback("onerror");
        };
        _speechRecognition.onend = function (e) {
            logfunc('onend', e);
            _callback("onend");
        };

        _speechRecognition.onaudiostart = function (e) {
            logfunc('onaudiostart', e); // 3
            beep(250, 2);
        };
        _speechRecognition.onaudioend = function (e) {
            logfunc('onaudioend', e);
        };

        _speechRecognition.onsoundstart = function (e) {
            logfunc('onsoundstart', e);
        };
        _speechRecognition.onsoundend = function (e) {
            logfunc('onsoundend', e);
        };


        _speechRecognition.onspeechstart = function (e) {
            logfunc('onspeechstart', e); // 4
        };
        _speechRecognition.onspeechend = function (e) {
            logfunc('onspeechend', e);
        };
        _speechRecognition.onnomatch = function (e) {
            logfunc('onnomatch', e);
        };

        _speechRecognition.onresult = function (event) {
            // Create the interim transcript string locally because we don't want it to persist like final transcript
            var interim_transcript = "";
            // logfunc(event.results)
            // Loop through the results from the speech recognition object.
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                // If the result item is Final, add it to Final Transcript, Else add it to Interim transcript
                logfunc('onresult', event.results[i].isFinal, event.results[i][0].transcript); // 5
                if (event.results[i].isFinal) {
                    final_transcript += event.results[i][0].transcript;
                    final_transcript += '<br>';
                    checkVitalSigns(event.results[i][0].transcript);
                } else {
                    interim_transcript += event.results[i][0].transcript;
                }
            }

            if (final_transcript.toLowerCase() == 'stopp') debugger;

            // Set the Final transcript and Interim transcript.
            _callback("final", final_transcript.replaceAll(String.fromCharCode(10)));
            _callback("interim", interim_transcript.replaceAll(String.fromCharCode(10)));

        };
    }

    function checkVitalSigns(aString) {
        logfunc('------------------ check vital singns ----------------');
        logfunc(aString);

        var words = [];
        aString.split(' ').forEach(function (word) {
            var wordlower = word.toLowerCase();
            if (wordlower.endsWith('.')) {
                words.push(wordlower.substring(0, wordlower.length - 1));
            } else {
                words.push(wordlower);
            }
        });
        logfunc(words.join('|'));

        _grammar.forEach(function (item) {
            var index = words.indexOf(item.label);
            if (index >= 0) {
                logfunc("Found: " + item.label);
                if (item.numberOfValues == 1) {
                    var result = null;
                    if (!isNaN(words[index + 1])) {
                        result = words[index + 1];
                    } else if (!isNaN(words[index + 2])) {
                        result = words[index + 2];
                    }
                    var data = { [item.label]: { [item.values[0]]: result } };
                    logfunc('RETURN: ', data);
                    _callback("data", data);
                } else if (item.numberOfValues == 2) {
                    var result = null;
                    var subindex = 0;
                    if (!isNaN(words[index + 1])) {
                        result = words[index + 1];
                        subindex = 1;
                    } else if (!isNaN(words[index + 2])) {
                        result = words[index + 2];
                        subindex = 2;
                    }
                    var data = { [item.label]: { [item.values[0]]: result } };
                    if (subindex > 0) {
                        subindex++;
                        if (!isNaN(words[index + subindex])) {
                            result = words[index + subindex];
                        } else if (!isNaN(words[index + ++subindex])) {
                            result = words[index + subindex];
                        } else {
                            return;
                        }
                        data[item.label][item.values[1]] = result;
                        logfunc('RETURN: ' + data);
                        _callback("data", data);
                    }
                }
            }
        });
    }
};
