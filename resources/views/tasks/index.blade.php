<!DOCTYPE html>
<html>
<head>
    <title>TaskManager</title>

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
            display: flex;
            justify-content: space-between;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .add-btn {
            background: #4f46e5;
            color: white;
            padding: 12px 18px;
            text-decoration: none;
            border-radius: 8px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px #ddd;
        }

        .task {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 10px #ddd;
        }

        .pending {
            color: #d97706;
            font-weight: bold;
        }

        .completed {
            color: #059669;
            font-weight: bold;
        }

        button,
        .btn {
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .edit {
            background: #f59e0b;
        }

        .delete {
            background: #ef4444;
        }

        .complete {
            background: #10b981;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>📋 TaskManager</h2>

    <a href="{{ route('tasks.create') }}" class="add-btn">
        + Add Task
    </a>
</div>

<div class="container">

    <h1>Dashboard</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @php
        $total = $tasks->count();
        $pending = $tasks->where('status', 'Pending')->count();
        $completed = $tasks->where('status', 'Completed')->count();
    @endphp

    <div class="stats">

        <div class="card">
            <h2>{{ $total }}</h2>
            <p>Total Tasks</p>
        </div>

        <div class="card">
            <h2>{{ $pending }}</h2>
            <p>Pending Tasks</p>
        </div>

        <div class="card">
            <h2>{{ $completed }}</h2>
            <p>Completed Tasks</p>
        </div>

    </div>

    <div class="card">

        <h2>My Tasks</h2>

        @forelse($tasks as $task)

            <div class="task">

                <h3>{{ $task->task_name }}</h3>

                <p>
                    {{ $task->description ?? 'No description' }}
                </p>

                <p>
                    Due Date:
                    {{ $task->due_date ?? 'No due date' }}
                </p>

                @if($task->status == 'Completed')
                    <p class="completed">
                        ✓ Completed
                    </p>
                @else
                    <p class="pending">
                        ⏳ Pending
                    </p>
                @endif

                <a
                    href="{{ route('tasks.edit', $task->id) }}"
                    class="btn edit">
                    Edit
                </a>

                <form
                    action="{{ route('tasks.destroy', $task->id) }}"
                    method="POST"
                    style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="delete"
                        onclick="return confirm('Delete this task?')">

                        Delete

                    </button>

                </form>

                <form
                    action="{{ route('tasks.status', $task->id) }}"
                    method="POST"
                    style="display:inline">

                    @csrf
                    @method('PATCH')

                    @if($task->status == 'Pending')

                        <input
                            type="hidden"
                            name="status"
                            value="Completed">

                        <button class="complete">
                            Complete
                        </button>

                    @else

                        <input
                            type="hidden"
                            name="status"
                            value="Pending">

                        <button class="complete">
                            Mark Pending
                        </button>

                    @endif

                </form>

            </div>

        @empty

            <p>No tasks yet. Add your first task!</p>

        @endforelse

    </div>

</div>

</body>
</html>