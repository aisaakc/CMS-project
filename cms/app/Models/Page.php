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
        'users_idusers',
    ];

    // Relación con el modelo User
    public function users()
    {
        return $this->belongsTo(User::class, 'users_idusers');
    }
}
