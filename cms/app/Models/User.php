<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $idusers
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $date_of_birth
 * @property int|null $cedula
 * @property string|null $address
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $x
 * @property string|null $tiktok
 * @property string|null $descripcion
 * @property string|null $password
 * @property int $nacionalidad_idnacionalidad
 *
 * @package App\Models
 */
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
