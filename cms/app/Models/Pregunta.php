<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	protected $table = 'preguntas';
	protected $primaryKey = 'idpregunta';
	public $timestamps = false;

	protected $fillable = [
		'pregunta'
	];
	public function users()
	{
		return $this->belongsToMany(User::class, 'id', 'preguntas_idpreguntas', 'users_idusers')
			->withPivot('id', 'respuesta');
	}
}
