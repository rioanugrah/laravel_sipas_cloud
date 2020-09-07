<?php

namespace App\Models;

use Eloquent as Model;

class Usr extends Model
{
    public $table = 'usr';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'usr_id';

    public $fillable = [
        'usr_id',
        'usr_nama',
        'usr_email',
        'usr_sandi',
        'usr_isaktif',
        'usr_registrasi_tgl',
        'usr_registrasi_status',
        'usr_staf',
        'usr_org',
        'usr_auth',
        'usr_ishapus',
        'usr_lastmasuk',
        'usr_prop',
    ];

    protected $casts = [
        'usr_id' => 'string',
        'usr_nama' => 'string',
        'usr_email' => 'string',
        'usr_sandi' => 'string',
        'usr_isaktif' => 'integer',
        'usr_registrasi_tgl' => 'date',
        'usr_registrasi_status' => 'integer',
        'usr_staf' => 'string',
        'usr_org' => 'string',
        'usr_auth' => 'string',
        'usr_ishapus' => 'integer',
        'usr_lastmasuk' => 'datetime',
        'usr_prop' => 'string',
        
    ];
}
