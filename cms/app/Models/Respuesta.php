<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
	protected $table = 'respuestas';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'users_idusers' => 'int',
		'preguntas_idpreguntas' => 'int'
	];

	protected $fillable = [
		'respuesta',
		'users_idusers',
		'preguntas_idpreguntas'
	];
	public function users()
	{
		return $this->belongsTo(User::class, 'idusers');
	}

	public function preguntas()
	{
		return $this->belongsTo(Pregunta::class, 'idpregunta');
	}
}
