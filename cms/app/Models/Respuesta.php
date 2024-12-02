<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Respuesta
 * 
 * @property int $id
 * @property int $users_idusers
 * @property int $preguntas_idpreguntas
 *
 * @package App\Models
 */
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
