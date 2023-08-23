<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::all();

        return view('notebooks.index', [
            'notebooks' => $notebooks,
        ]);
    }
}
