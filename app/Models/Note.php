<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'date',
        'title',
        'message',
    ];

    public function notebooks()
    {
        return $this->belongsToMany(Notebook::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
