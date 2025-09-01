<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Task;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/task', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

Route::post('/tasks', function (Request $request) {
    // Create task
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});