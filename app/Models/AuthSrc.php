<?php

namespace App\Models;

use Eloquent as Model;

class AuthSrc extends Model
{
    public $table = 'authsrc';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'auth_src_id';

    public $fillable = [
        'auth_src_id',
        'auth_src_usr',
        'auth_src_provider',
        'auth_src_prop',
    ];

    protected $casts = [
        'auth_src_id' => 'string',
        'auth_src_usr' => 'string',
        'auth_src_provider' => 'string',
        'auth_src_prop' => 'string',
    ];
}
