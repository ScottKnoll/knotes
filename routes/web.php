<?php

use App\Http\Controllers\NotebookAssignmentController;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('notes', NoteController::class)->except(['show']);
Route::resource('notebooks', NotebookController::class);
Route::prefix('notes/{note}')->group(function () {
    Route::post('assign-notebook', [NotebookAssignmentController::class, 'store']);
    Route::delete('remove-notebook', [NotebookAssignmentController::class, 'destroy']);
});

Route::resource('tasks', TaskController::class)->only(['store', 'update', 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
