<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 * 
 * @property int $idpregunta
 * @property string $pregunta
 *
 * @package App\Models
 */
class Pregunta extends Model
{
	protected $table = 'preguntas';
	protected $primaryKey = 'idpregunta';
	public $timestamps = false;

	protected $fillable = [
		'pregunta'
	];
}
