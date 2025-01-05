<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'author_id',
    ];

    // Relación con el modelo User
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
