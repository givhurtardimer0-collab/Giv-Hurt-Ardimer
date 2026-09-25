<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>

<body>

<h1>Edit Task</h1>

<form
    action="{{ route('tasks.update', $task) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <p>
        <label>Task Name</label><br>

        <input
            type="text"
            name="task_name"
            value="{{ $task->task_name }}"
            required
        >
    </p>

    <p>
        <label>Description</label><br>

        <textarea name="description">{{ $task->description }}</textarea>
    </p>

    <p>
        <label>Status</label><br>

        <select name="status">

            <option
                value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>

        </select>
    </p>

    <p>
        <label>Due Date</label><br>

        <input
            type="date"
            name="due_date"
            value="{{ $task->due_date?->format('Y-m-d') }}"
        >
    </p>

    <button type="submit">
        Update Task
    </button>

</form>

<br>

<a href="{{ route('tasks.index') }}">
    Back to Tasks
</a>

</body>
</html>