<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteAssignmentController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            'notebook_id' => 'required|exists:notebooks,id',
            'note_id' => 'required|exists:notes,id',
        ]);

        $notebook = auth()->user()->notebooks()->findOrFail($validated['notebook_id']);

        $note = Note::findOrFail($validated['note_id']);

        $notebook->notes()->attach($note);

        session()->flash('alert_message', 'Note added to notebook successfully.');

        return back();
    }

    public function destroy($noteId)
    {
        $noteId = request('note_id');
        $notebookId = request('notebook_id');

        $notebook = auth()->user()->notebooks()->findOrFail($notebookId);
        $note = Note::findOrFail($noteId);

        $notebook->notes()->detach($noteId);

        session()->flash('alert_message', 'Note removed from notebook successfully.');

        return back();
    }
}
