<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

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
            'date' => 'nullable',
            'title' => 'nullable',
            'message' => 'required',
        ]);

        $validated['user_id'] = auth()->id();

        Note::create($validated);

        return redirect('/notes');
    }

    public function show(Note $note)
    {
        Note::all();

        return view('notes.show', [
            'note' => $note
        ]);
    }

    public function edit(Note $note)
    {
        return view('notes.edit', [
            'note' => $note,
        ]);
    }

    public function update(Request $request, Note $note) 
    {
        $validated = request()->validate([
            'date' => 'nullable',
            'title' => 'nullable',
            'message' => 'required',
        ]);
    
        $note->update($validated);

        return redirect('/notes/' . $note->id);
    }
    

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('/notes');
    }
    
}
