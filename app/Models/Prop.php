<?php

namespace App\Models;

use Eloquent as Model;

class Prop extends Model
{
    public $table = 'prop';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'prop_id';

    public $fillable = [
        'prop_id',
        'prop_buat_staf',
        'prop_buat_tgl',
        'prop_ubah_staf',
        'prop_ubah_tgl',
        'prop_hapus_staf',
        'prop_hapus_tgl',
        'prop_entitas_id',
        'prop_entitas',
        'prop_slug',
    ];

    protected $casts = [
        'prop_id' => 'string',
        'prop_buat_staf' => 'string',
        'prop_buat_tgl' => 'datetime',
        'prop_ubah_staf' => 'string',
        'prop_ubah_tgl' => 'datetime',
        'prop_hapus_staf' => 'string',
        'prop_hapus_tgl' => 'datetime',
        'prop_entitas_id' => 'string',
        'prop_entitas' => 'string',
        'prop_slug' => 'string',
    ];
}
