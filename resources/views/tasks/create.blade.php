<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>

<body>

<h1>Add New Task</h1>

<form action="{{ route('tasks.store') }}" method="POST">

    @csrf

    <p>
        <label>Task Name</label><br>
        <input type="text" name="task_name" required>
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description"></textarea>
    </p>

    <p>
        <label>Status</label><br>

        <select name="status">
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
    </p>

    <p>
        <label>Due Date</label><br>
        <input type="date" name="due_date">
    </p>

    <button type="submit">
        Save Task
    </button>

</form>

<br>

<a href="{{ route('tasks.index') }}">
    Back to Tasks
</a>

</body>
</html>