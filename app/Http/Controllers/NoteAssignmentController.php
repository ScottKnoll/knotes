<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;

class NoteAssignmentController extends Controller
{
    public function store(Notebook $notebook, Note $note)
    {
        $notebook->notes()->attach($note);

        session()->flash('alert_message', 'Note added to notebook successfully.');

        return back();
    }

    public function destroy(Notebook $notebook, Note $note)
    {
        $notebook->notes()->detach($note);

        session()->flash('alert_message', 'Note removed from notebook successfully.');

        return back();
    }
}
