<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
	protected $table = 'respuestas';
	public $timestamps = false;

	protected $casts = [
		'users_idusers' => 'int',
		'preguntas_idpreguntas' => 'int'
	];

	protected $fillable = [
		'users_idusers',
		'preguntas_idpreguntas'
	];
}
