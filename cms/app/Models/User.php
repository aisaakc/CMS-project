<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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
		'address',
		'email',
		'facebook',
		'instagram',
		'x',
		'tiktok',
		'descripcion',
		'password',
		'nacionalidad_idnacionalidad'
	];
}
