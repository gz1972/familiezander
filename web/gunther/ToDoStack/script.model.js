/**
 * @class Model
 *
 * Manages the data of the application.
 */
class Model {
	constructor() {
		this.todos = JSON.parse(localStorage.getItem('todos')) || [];
		if (this.todos.length > 0) {
			this.todos.forEach(todo => {
				todo.start = new Date(todo.start);
				todo.stop = todo.stop ? new Date(todo.stop) : null;
			});
		}
	}

	bindTodoListChanged(callback) {
		this.onTodoListChanged = callback;
	}

	_commit(todos) {
		this.onTodoListChanged(todos);
		localStorage.setItem('todos', JSON.stringify(todos));
	}

	addTodo(todoText) {
		const todo = {
			id: this.todos.length > 0 ? this.todos[this.todos.length - 1].id + 1 : 1,
			order: this.todos.length > 0 ? this.todos[this.todos.length - 1].order + 1 : 1,
			text: todoText,
			complete: false,
			start: new Date(), // kann mit todo.start.toJSON() in einen String im Format "yyyy-MM-ddTHH:mm:ss.uuuZ" umgewandelt werden
			stop: null,
			//actions: []
		};

		this.todos.push(todo);

		this._commit(this.todos);
	}

	editTodo(id, updatedText) {
		this.todos = this.todos.map(todo =>
			todo.id === id ? { id: todo.id, order: todo.order, text: updatedText, complete: todo.complete, start: todo.start, stop: todo.stop } : todo //actions: 
		);

		this._commit(this.todos);
	}

	deleteTodo(id) {
		this.todos = this.todos.filter(todo => todo.id !== id);

		this._commit(this.todos);
	}

	toggleTodo(id) {
		//this.todos = this.todos.map(todo =>
		//	todo.id === id ? { id: todo.id, text: todo.text, complete: !todo.complete } : todo
		//);
		
		this.todos = this.todos.map(todo =>
			{
				if (todo.id === id) {
					return { 
						id: todo.id, 
						order: todo.order,
						text: todo.text, 
						complete: !todo.complete,
						start: todo.start,
						stop: !todo.complete ? new Date() : null,
						//actions: todo.actions
					};
				} else {
					return todo;
				}
			}
		);

		this._commit(this.todos);
	}
	
	insertBefore(idDragged, idTarget) {
		//console.log(`insertBefore(${idDragged}, ${idTarget})`);
		let dragged = this.todos.find((todo) => todo.id == idDragged);
		let target = this.todos.find((todo) => todo.id == idTarget);
		let targetOrder = target.order;
		
		if (dragged.order != target.order) {
			if (dragged.order < target.order) {
				// Element von vorn nach hinten geschoben
				this.todos.forEach(todo => {
					if (todo.order > dragged.order && todo.order < target.order) {
						let order = todo.order;
						todo.order--;
						//console.log(`ID: ${todo.id} \"${todo.text}\" change order from: ${order} to ${todo.order}`);
					}
				});
				let order = dragged.order;
				dragged.order = targetOrder - 1;
				//console.log(`ID: ${dragged.id} \"${dragged.text}\" change order from: ${order} to ${dragged.order}`);
			} else {
				// Element von hinten nach vorn geschoben
				this.todos.forEach(todo => {
					if (todo.order < dragged.order && todo.order >= target.order) {
						let order = todo.order;
						todo.order++;
						//console.log(`ID: ${todo.id} \"${todo.text}\" change order from: ${order} to ${todo.order}`);
					}
				});
				let order = dragged.order;
				dragged.order = targetOrder;
				//console.log(`ID: ${dragged.id} \"${dragged.text}\" change order from: ${order} to ${dragged.order}`);
			}
		}

		this._commit(this.todos);
	}
}
