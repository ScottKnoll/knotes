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

    public function store(Request $request)
    {
        $validated = request()->validate([
            'date' => 'nullable',
            'title' => 'nullable',
            'message' => 'required',
        ]);
    }

    public function show(Note $note)
    {
        //
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(Note $note)
    {
        $validated = request()->validate([
            'date' => 'nullable',
            'title' => 'nullable',
            'message' => 'required',
        ]);
    }

    public function destroy(Note $note)
    {
        //
    }
}
