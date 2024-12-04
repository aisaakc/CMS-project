<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
	protected $table = 'respuestas';
	protected $primaryKey = 'idrespuesta';
	public $timestamps = false;

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
