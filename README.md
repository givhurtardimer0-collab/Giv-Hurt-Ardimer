<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .button {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .edit {
            background: #f59e0b;
            color: white;
        }

        .delete {
            background: #dc2626;
            color: white;
            border: none;
            cursor: pointer;
        }

        .success {
            background: #d1fae5;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="add-button">
        + Add Task
    </a>

    <table>

        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($tasks as $task)

            <tr>

                <td>
                    {{ $task->task_name }}
                </td>

                <td>
                    {{ $task->description }}
                </td>

                <td>
                    {{ $task->status }}
                </td>

                <td>
                    {{ $task->due_date?->format('M d, Y') }}
                </td>

                <td>

                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="button edit"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                        style="display:inline;"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="button delete"
                            onclick="return confirm('Delete this task?')"
                        >
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5">
                    No tasks found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>