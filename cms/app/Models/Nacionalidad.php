<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
	protected $table = 'nacionalidad';
	protected $primaryKey = 'idnacionalidad';
	public $timestamps = false;

	protected $fillable = [
		'nacionalidad'
	];
}
