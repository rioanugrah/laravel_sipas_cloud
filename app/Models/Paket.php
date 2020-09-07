<?php

namespace App\Models;

use Eloquent as Model;

class Paket extends Model
{
    public $table = 'paket';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'paket_id';

    public $fillable = [
        'paket_id',
        'paket_nama',
        'paket_tipe',
        'paket_ishapus',
        'paket_isaktif',
        'paket_nominal',
        'paket_prop',
    ];

    protected $casts = [
        'paket_id' => 'string',
        'paket_nama' => 'string',
        'paket_tipe' => 'string',
        'paket_ishapus' => 'integer',
        'paket_isaktif' => 'integer',
        'paket_nominal' => 'integer',
        'paket_prop' => 'string',
    ];
}
