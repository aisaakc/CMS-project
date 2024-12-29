<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = 'publications';
    protected $primaryKey = 'idpublications';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'image',
        'fecha_creacion',
        'fecha_publicacion',
        'categoria',
        'estado',
        'users_idusers',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_idusers');
    }
}
