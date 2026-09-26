<!DOCTYPE html>
<html>
<head>
    <title>Add Task - TaskManager</title>

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

        .error {
            background: #fee2e2;
            padding: 15px;
            color: #991b1b;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>📋 TaskManager</h2>
</div>

<div class="container">

    <h1>Add New Task</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label>Task Name</label>

        <input
            type="text"
            name="task_name"
            value="{{ old('task_name') }}"
            placeholder="Enter task name"
            required>

        <label>Description</label>

        <textarea
            name="description"
            placeholder="Enter description">{{ old('description') }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input
            type="date"
            name="due_date"
            value="{{ old('due_date') }}">

        <button type="submit">
            Save Task
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