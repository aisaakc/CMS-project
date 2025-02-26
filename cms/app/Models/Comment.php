<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;

    protected $table = 'comments';

    protected $fillable =[
        'full_name',
        'corero',
        'coment',
        'correo',
        'users_idusers',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'users_idusers' );
    }
}
