<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            text-align: center;
        }

        a, button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .add {
            background: #2563eb;
            color: white;
        }

        .edit {
            background: #f59e0b;
            color: white;
        }

        .delete {
            background: #dc2626;
            color: white;
        }

        table {
            width: 100%;
            margin-top: 20px;
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background: #e5e7eb;
        }

        .success {
            padding: 10px;
            background: #d1fae5;
            margin-top: 15px;
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

    <br>

    <a href="{{ route('tasks.create') }}" class="add">
        + Add Task
    </a>

    <table>

        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>

        @forelse($tasks as $task)

        <tr>

            <td>{{ $task->task_name }}</td>

            <td>{{ $task->description }}</td>

            <td>{{ $task->status }}</td>

            <td>
                {{ $task->due_date?->format('M d, Y') }}
            </td>

            <td>

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="edit"
                >
                    Edit
                </a>

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    style="display:inline"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        class="delete"
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
                No tasks yet.
            </td>
        </tr>

        @endforelse

    </table>

</div>

</body>
</html>