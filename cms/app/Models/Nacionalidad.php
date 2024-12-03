<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
	protected $table = 'nacionalidades';
	protected $primaryKey = 'idnacionalidad';
	public $timestamps = false;

	protected $fillable = [
		'nacionalidad'
	];
}
