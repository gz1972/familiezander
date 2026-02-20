/**
 * @class View
 *
 * Visual representation of the model. -- TODO: Anzeige für Passworte weiter bauen
 */
class View {
  constructor() {
    this.app = this.getElement('#root');
    this.form = this.createElement('form');
	
    this.inputTarget = this.createElement('input');
    this.inputTarget.type = 'text';
    this.inputTarget.placeholder = 'Add Target';
    this.inputTarget.name = 'Target';
	
    this.inputPassword = this.createElement('input');
    this.inputPassword.type = 'password';
    this.inputPassword.placeholder = 'Add Password';
    this.inputPassword.name = 'Password';
	
    this.submitButton = this.createElement('button');
    this.submitButton.textContent = 'Submit';
    this.form.append(this.inputTarget, this.inputPassword, this.submitButton);
    this.title = this.createElement('h1');
    this.title.textContent = 'passwords';
    this.passwordList = this.createElement('ul', 'password-list');
    this.app.append(this.title, this.form, this.passwordList);

    this._temporaryTargetText = '';
    this._temporaryPasswordText = '';
    this._initLocalListeners();
  }

  get _targetText() {
    return this.inputTarget.value;
  }

  get _passwordText() {
    return this.inputPassword.value;
  }

  _resetInput() {
    this.inputTarget.value = '';
	this.inputPassword.value = '';
  }

  createElement(tag, className) {
    const element = document.createElement(tag);

    if (className) element.classList.add(className);

    return element;
  }

  getElement(selector) {
    const element = document.querySelector(selector);

    return element;
  }

  displayPasswords(passwords) {
    // Delete all nodes
    while (this.passwordList.firstChild) {
      this.passwordList.removeChild(this.passwordList.firstChild);
    }

    // Show default message
    if (passwords.length === 0) {
      const p = this.createElement('p');
      p.textContent = 'No password yet! Create one?';
      this.passwordList.append(p);
    } else {
      // Create nodes
      passwords.forEach(password => {
        const li = this.createElement('li');
        li.id = password.id;

        //const checkbox = this.createElement('input')
        //checkbox.type = 'checkbox'
        //checkbox.checked = password.complete

        const spanTarget = this.createElement('span');
        spanTarget.contentEditable = true;
        spanTarget.classList.add('target');
        spanTarget.classList.add('editable');
        spanTarget.textContent = password.target;

        const spanPassword = this.createElement('input');
		spanPassword.type = 'password';
		spanPassword.classList.add('password');
		spanPassword.classList.add('check');
		spanPassword.placeholder = 'Guess Password';
		
        //const spanPassword = this.createElement('span');
        //spanPassword.contentEditable = true;
        //spanPassword.classList.add('password');
        //spanPassword.classList.add('editable');
        //spanPassword.textContent = password.text -- hier muss ich das Passwortbeim Check eintragen

        const checkButton = this.createElement('button', 'check');
        checkButton.textContent = 'Check';
        const deleteButton = this.createElement('button', 'delete');
        deleteButton.textContent = 'Delete';
        li.append(spanTarget, spanPassword, checkButton, deleteButton);

        // Append nodes
        this.passwordList.append(li);
      });
    }

    // Debugging
    console.log(passwords)
  }

  _initLocalListeners() {
    this.passwordList.addEventListener('input', event => {
      if (event.target.classList.contains('target')) {
        this._temporaryTargetText = event.target.innerText;
      }
    });
  }
  
  bindAddPassword(handler) {
    this.form.addEventListener('submit', event => {
      event.preventDefault();

      if (this._targetText && this._passwordText) {
        handler(this._targetText, this._passwordText);
        this._resetInput();
      }
    });
  }

  bindDeletePassword(handler) {
    this.passwordList.addEventListener('click', event => {
      if (event.target.className === 'delete') {
        const id = parseInt(event.target.parentElement.id);

        handler(id);
      }
    });
  }

  bindEditPassword(handler) {
    this.passwordList.addEventListener('focusout', event => {
      if (this._temporaryPasswordText && this._temporaryTargetText) {
        const id = parseInt(event.target.parentElement.id);

        handler(id, this._temporaryTargetText, this._temporaryPasswordText);
		this._temporaryTargetText = '';
        this._temporaryPasswordText = '';
      }
    });
  }

  bindCheckPassword(handler) {
    this.passwordList.addEventListener('click', event => {
      if (event.target.className === 'check') {
		  
		let passwordGuess = Array.prototype.find.call(event.target.parentElement.childNodes, function(node) {
			return node.localName == "input";
		}).value;
		
		if (passwordGuess && passwordGuess.length > 0) {

        const id = parseInt(event.target.parentElement.id);

          if (handler(id, passwordGuess)) {
			alert("ok");
		} else {
			alert("falsch");
		}
		}
      }
    })
  }
}
