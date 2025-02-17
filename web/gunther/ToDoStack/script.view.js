/**
 * @class View
 *
 * Visual representation of the model.
 */
class View {
  static DraggedItem = null;
  
  constructor() {
    this.app = this.getElement('#root')
    this.form = this.createElement('form')
    this.input = this.createElement('input')
    this.input.type = 'text'
    this.input.placeholder = 'Add todo'
    this.input.name = 'todo'
    this.submitButton = this.createElement('button')
    this.submitButton.textContent = 'Submit'
    this.form.append(this.input, this.submitButton)
    this.title = this.createElement('h1')
    this.title.textContent = 'Todos'
    this.todoList = this.createElement('ul', 'todo-list')
    this.app.append(this.title, this.form, this.todoList)

    this._temporaryTodoText = ''
    this._initLocalListeners()
  }

  get _todoText() {
    return this.input.value
  }

  _resetInput() {
    this.input.value = ''
  }

  createElement(tag, className) {
    const element = document.createElement(tag)

    if (className) element.classList.add(className)

    return element
  }

  getElement(selector) {
    const element = document.querySelector(selector)

    return element
  }

  displayTodos(todos) {
    // Delete all nodes
    while (this.todoList.firstChild) {
      this.todoList.removeChild(this.todoList.firstChild);
    }

    // Show default message
    if (todos.length === 0) {
      const p = this.createElement('p');
      p.textContent = 'Nothing to do! Add a task?';
      this.todoList.append(p);
    } else {
	  todos.sort((a,b) => {
		  return a.order - b.order;
	  });
      // Create nodes
      todos.forEach(todo => {
        const li = this.createElement('li');
        li.id = todo.id;
		li.draggable = "true";
		li.addEventListener('dragstart', this.handleDragStart);
        li.addEventListener('dragover', this.handleDragOver);
        li.addEventListener('drop', this.handleDrop);
        li.addEventListener('dragend', this.handleDragEnd);
        // im css: cursor: grabbing;
		// see: https://www.w3schools.com/cssref/tryit.php?filename=trycss_cursor

        const checkbox = this.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = todo.complete;

        const name = this.createElement('span');
        name.contentEditable = true;
        name.classList.add('editable');

        const dt = this.createElement('span');
		dt.textContent = todo.start ? todo.start.toLocaleString('de-DE') : "";
		if (todo.stop) {
			dt.textContent += `\r\n${todo.stop.toLocaleString('de-DE')}`;
		}
		dt.classList.add("timestamp");

        if (todo.complete) {
          const strike = this.createElement('s');
          strike.textContent = todo.text;
          name.append(strike);
        } else {
          name.textContent = todo.text;
        }

        const deleteButton = this.createElement('button', 'delete');
        deleteButton.textContent = 'Delete';
        li.append(checkbox, name, dt, deleteButton);

        // Append nodes
        this.todoList.append(li);
      })
    }

    // Debugging
    console.log(todos);
  }

  _initLocalListeners() {
    this.todoList.addEventListener('input', event => {
      if (event.target.className === 'editable') {
        this._temporaryTodoText = event.target.innerText;
      }
    })
  }

  bindAddTodo(handler) {
    this.form.addEventListener('submit', event => {
      event.preventDefault();

      if (this._todoText) {
        handler(this._todoText);
        this._resetInput();
      }
    })
  }

  bindDeleteTodo(handler) {
    this.todoList.addEventListener('click', event => {
      if (event.target.className === 'delete') {
        const id = parseInt(event.target.parentElement.id)

        handler(id)
      }
    })
  }

  bindEditTodo(handler) {
    this.todoList.addEventListener('focusout', event => {
      if (this._temporaryTodoText) {
        const id = parseInt(event.target.parentElement.id)

        handler(id, this._temporaryTodoText)
        this._temporaryTodoText = ''
      }
    })
  }

  bindToggleTodo(handler) {
    this.todoList.addEventListener('change', event => {
      if (event.target.type === 'checkbox') {
        const id = parseInt(event.target.parentElement.id)

        handler(id)
      }
    })
  }
  
  static signalDrop(idDragged, idTarget) {
  }
  
  bindDrop(handler) {
	View.signalDrop = handler;
  }
  
  handleDrop(e) {
	  //console.log(`ID: ${View.DraggedItem.id} - drop to ID: ${this.id}`);
	  if (this !== View.DraggedItem) {
		  View.signalDrop(View.DraggedItem.id, this.id)
	  }
  }
  
  handleDragStart(e) {
	//console.log(`ID: ${this.id} - drag`);
	View.DraggedItem = this;
	setTimeout(() => {
	  this.style.display = 'none';
	  this.style.cursor = 'grabbing';
	}, 0);
  }
  
  handleDragOver(e) {
    e.preventDefault();
  }
  
  handleDragEnd(e) {
    setTimeout(() => {
      this.style.display = 'block';
	  this.style.cursor = 'grab';
	}, 0);
	View.DraggedItem = null;
  }
}
