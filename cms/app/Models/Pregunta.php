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
}
