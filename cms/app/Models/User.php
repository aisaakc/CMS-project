<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'idusers';
    public $timestamps = false;

    protected $casts = [
        'cedula' => 'int',
        'nacionalidad_idnacionalidad' => 'int',
        'roles_idroles' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'cedula',
        'user_name',
        'address',
        'email',
        'facebook',
        'instagram',
        'x',
        'tiktok',
        'descripcion',
        'password',
        'nacionalidad_idnacionalidad',
        'roles_idroles'
    ];

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_idnacionalidad');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_idroles');
    }

    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'respuestas', 'users_idusers', 'preguntas_idpreguntas')
            ->withPivot('respuesta');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'users_idusers');
    }
}
