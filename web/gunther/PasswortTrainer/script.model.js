/**
 * @class Model
 *
 * Manages the data of the application.
 */
class Model {
  constructor() {
    this.passwords = JSON.parse(localStorage.getItem('passwords')) || [];
  }

  bindPasswordListChanged(callback) {
    this.onPasswordListChanged = callback;
  }

  _commit(passwords) {
    this.onPasswordListChanged(passwords);
    localStorage.setItem('passwords', JSON.stringify(passwords));
  }

  addPassword(passwordTarget, passwordText) {
    const password = {
      id: this.passwords.length > 0 ? this.passwords[this.passwords.length - 1].id + 1 : 1,
	  target: passwordTarget,
      // text: passwordText
      text: btoa(CryptoJS.MD5(passwordText))
    };

    this.passwords.push(password);

    this._commit(this.passwords);
  }

  editPassword(id, updatedTarget, updatedText) {
    this.passwords = this.passwords.map(password =>
      // password.id === id ? { id: password.id, target: updatedTarget, text: updatedText } : password
      password.id === id ? { id: password.id, target: updatedTarget, text: btoa(CryptoJS.MD5(updatedText)) } : password
    );

    this._commit(this.passwords);
  }

  deletePassword(id) {
    this.passwords = this.passwords.filter(password => password.id !== id);

    this._commit(this.passwords);
  }

  checkPassword(id, passwordText) {
	const password = this.passwords.find(password => {
		return password.id == id;
	});
	
	// return password.text == passwordText;
	return password.text == btoa(CryptoJS.MD5(passwordText));
  }
}
