/**
 * @class Controller
 *
 * Links the user input and the view output.
 *
 * @param model
 * @param view
 */
class Controller {
  constructor(model, view) {
    this.model = model;
    this.view = view;

    // Explicit this binding
    this.model.bindPasswordListChanged(this.onPasswordListChanged);
    this.view.bindAddPassword(this.handleAddPassword);
    this.view.bindEditPassword(this.handleEditPassword);
    this.view.bindDeletePassword(this.handleDeletePassword);
    this.view.bindCheckPassword(this.handleCheckPassword);

    // Display initial passwords
    this.onPasswordListChanged(this.model.passwords);
  }

  onPasswordListChanged = passwords => {
    this.view.displayPasswords(passwords);
  }

  handleAddPassword = (passwordTarget, passwordText) => {
    this.model.addPassword(passwordTarget, passwordText);
  }

  handleEditPassword = (id, passwordTarget, passwordText) => {
    this.model.editPassword(id, passwordTarget, passwordText);
  }

  handleDeletePassword = id => {
    this.model.deletePassword(id);
  }

  handleCheckPassword = (id, passwordText) => {
    return this.model.checkPassword(id, passwordText);
  }
}
