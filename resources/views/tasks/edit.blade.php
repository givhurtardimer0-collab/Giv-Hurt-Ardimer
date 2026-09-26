<!DOCTYPE html>
<html>
<head>
    <title>Edit Task - TaskManager</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            margin: 0;
        }

        .header {
            background: #111827;
            color: white;
            padding: 20px 40px;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px #ddd;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin: 8px 0 20px;
            border: 1px solid #ddd;
            border-radius: 7px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
        }

        button,
        a {
            padding: 11px 18px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #4f46e5;
            color: white;
        }

        .cancel {
            background: #ddd;
            color: #333;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>📋 TaskManager</h2>
</div>

<div class="container">

    <h1>Edit Task</h1>

    @if($errors->any())

        <div style="background:#fee2e2;padding:15px;color:#991b1b;">

            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

        </div>

    @endif

    <form
        action="{{ route('tasks.update', $task->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <label>Task Name</label>

        <input
            type="text"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required>

        <label>Description</label>

        <textarea name="description">{{ old('description', $task->description) }}</textarea>

        <label>Status</label>

        <select name="status">

            <option
                value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option
                value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input
            type="date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}">

        <button type="submit">
            Update Task
        </button>

        <a
            href="{{ route('tasks.index') }}"
            class="cancel">
            Cancel
        </a>

    </form>

</div>

</body>
</html>