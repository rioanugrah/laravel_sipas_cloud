<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropHapusData extends Model
{
    public $table = 'prophapusdata';
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
