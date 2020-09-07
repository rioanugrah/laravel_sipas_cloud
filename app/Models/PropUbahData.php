<?php

namespace App\Models;

use Eloquent as Model;

class PropUbahData extends Model
{
    public $table = 'propubahdata';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'prop_id';

    public $fillable = [
        'prop_id',
        'prop_data',
    ];

    protected $casts = [
        'prop_id' => 'string',
        'prop_data' => 'string',
    ];
}
