<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteAssignmentController extends Controller
{
    public function store(Note $note)
    {
        $validated = request()->validate([
            'notebook_id' => 'required|exists:notebooks,id'
        ]);

        return $notebook = auth()->user()->notebooks()->findOrFail($validated['notebook_id']);
        $notebook->notes()->attach($note);

        session()->flash('alert_message', 'Note added to notebook successfully.');

        return back();
    }

    public function destroy(Note $note, $notebookId)
    {
        $notebook = auth()->user()->notebooks()->findOrFail($notebookId);
        $notebook->notes()->detach($note);

        session()->flash('alert_message', 'Note removed from notebook successfully.');

        return back();
    }
}
