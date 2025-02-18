<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::query()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('notes.index', [
            'notes' => $notes,
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'nullable',
            'message' => 'required',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['date'] = now();

        Note::create($validated);

        return redirect('/notes');
    }

    public function edit(Note $note)
    {
        $note->load('notebooks');

        $assignedNotebookIds = $note->notebooks->pluck('id');

        $notebooks = auth()->user()->notebooks()->whereNotIn('id', $assignedNotebookIds)->get();

        return view('notes.edit', [
            'note' => $note,
            'notebooks' => $notebooks,
        ]);
    }

    public function update(Note $note)
    {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'message' => 'required',
        ]);

        $note->update($validated);

        return redirect('notes');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('notes');
    }
}
