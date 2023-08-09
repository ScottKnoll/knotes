<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'note_id',
        'title',
        'status',
        'due_date',
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
