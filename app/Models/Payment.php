<?php

namespace App\Models;

use Eloquent as Model;

class Payment extends Model
{
    public $table = 'payment';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'payment_id';

    public $fillable = [
        'payment_id',
        'payment_nomor',
        'payment_user',
        'payment_tgl',
        'payment_nominal',
        'payment_status',
        'payment_org',
        'payment_subslog',
        'payment_prop',
    ];

    protected $casts = [
        'payment_id' => 'string',
        'payment_nomor' => 'string',
        'payment_user' => 'string',
        'payment_tgl' => 'datetime',
        'payment_nominal' => 'integer',
        'payment_status' => 'integer',
        'payment_org' => 'string',
        'payment_subslog' => 'string',
        'payment_prop' => 'string',
    ];

    public function usr(){
        return $this->belongsTo(\App\Models\Usr::class, 'payment_user');
    }

    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'payment_org');
    }
}
