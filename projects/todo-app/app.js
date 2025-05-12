function print(note = "") {
	console.log(`--------- ${note}`);
	console.log('todos: ', todos);
}

const todos = [];
let count = 0;

function add(content) {
	const todo = {
		id: `a${count++}`,
		content: content
	};
	todos.push(todo);
	print(`Added ${content}`);
}

function remove(id) {
	const todo = {};
	print(`Removed ${todos[id].content}`);
	todos.splice(id, 1);
}

function complete(id) {
	todos[id].complete = true;
	print(`Completed ${todos[id].content}`);
}

function update(id, content) {
	const todo = todos.find(todo => todo.id === id);
	if (todo) {
		todo.content = content;
		print(`Updated ${id}`);
	} else {
		console.log(`No todo found with id: ${id}`);
	}
}

add("Go to the store");
add("Prepare dinner");

complete(0);

add("Make this video");

remove(1);

update("a0", "Poop")

add("Go to sleep");
