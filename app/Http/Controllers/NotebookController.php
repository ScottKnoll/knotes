<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;

class NotebookController extends Controller
{
    public function index()
    {
        $sortBy = request('sort_by', 'created_at');
        $sortDirection = request('sort_direction', 'desc');

        $notebooks = Notebook::with('notes')
            ->orderBy($sortBy, $sortDirection)
            ->get();

        return view('notebooks.index', [
            'notebooks' => $notebooks,
        ]);
    }

    public function create()
    {
        return view('notebooks.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();

        Notebook::create($validated);

        return redirect()->route('notebooks.index');
    }

    public function show(Notebook $notebook)
    {
        $notes = $notebook->notes()->get();

        return view('notebooks.show', [
            'notebook' => $notebook,
            'notes' => $notes,
        ]);
    }

    public function edit(Notebook $notebook)
    {
        return view('notebooks.edit', [
            'notebook' => $notebook,
        ]);
    }

    public function update(Notebook $notebook)
    {
        $validated = request()->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $notebook->update($validated);

        return redirect()->route('notebooks.show', ['notebook' => $notebook->id]);
    }
}
