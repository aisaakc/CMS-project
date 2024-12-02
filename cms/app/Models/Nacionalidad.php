<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nacionalidad
 * 
 * @property int $idnacionalidad
 * @property string $nacionalidad
 *
 * @package App\Models
 */
class Nacionalidad extends Model
{
	protected $table = 'nacionalidad';
	protected $primaryKey = 'idnacionalidad';
	public $timestamps = false;

	protected $fillable = [
		'nacionalidad'
	];
}
