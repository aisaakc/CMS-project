<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

	protected $table = 'users';
	protected $primaryKey = 'idusers';
	public $timestamps = false;

	protected $casts = [
		'cedula' => 'int',
		'nacionalidad_idnacionalidad' => 'int'
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
		'image',
		'address',
		'email',
		'facebook',
		'instagram',
		'x',
		'tiktok',
		'descripcion',
		'password',
		'role',
		'status',
		'nacionalidad_idnacionalidad'
	];

	public function nacionalidad()
	{
		return $this->belongsTo(Nacionalidad::class, 'idnacionalidad');
	}
	public function preguntas()
	{
		return $this->belongsToMany(Pregunta::class, 'respuestas', 'users_idusers', 'preguntas_idpreguntas')
			->withPivot('respuesta');
	}
}
