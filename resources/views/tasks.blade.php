<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- TODO: New Task Card -->
    <div>
    <h2>New Task</h2>

    <!-- New Task Form -->
    <form action="{{ url('tasks') }}" method="POST">
        {{ csrf_field() }}

        <label>
            Task Name: <input type="text" name="name" placeholder="e.g. Wash the dishes" required>
        </label>

        <button>Add Task</button>
        </form>
    </div>


    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <h2>Current Tasks</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <!-- Task Name -->
                    <div>{{ $task->name }}</div>
                    <!-- TODO Delete Button -->
                    <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button>Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

@endsection