<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'thumbnail',
        'level_id',
    ];

    /**
     * Get the level that owns the lesson.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
