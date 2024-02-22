<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Note $note)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|date',
            'due_date' => 'required|boolean',
        ]);

        $note->tasks()->create($validated);

        session()->flash('alert_message', 'Task created successfully.');

        return redirect()->route('notes.index');
    }

    public function update(Note $note)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|date',
            'due_date' => 'required|boolean',
        ]);

        $note->tasks()->update($validated);

        session()->flash('alert_message', 'Task updated successfully.');

        return redirect()->route('notes.show', ['note' => $note->id]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        session()->flash('alert_message', 'Task deleted successfully.');

        return redirect()->route('notes.index');
    }
}
