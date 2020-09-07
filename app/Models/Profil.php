<?php

namespace App\Models;

use Eloquent as Model;

class Profil extends Model
{
    public $table = 'profil';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'profil_id';

    public $fillable = [
        'profil_id',
        'profil_staf',
        'profil_staf_nama',
        'profil_unit',
        'profil_unit_nama',
        'profil_jab',
        'profil_jab_nama',
        'profil_buat_tgl',
        'profil_prop',
    ];

    protected $casts = [
        'profil_id' => 'string',
        'profil_staf' => 'string',
        'profil_staf_nama' => 'string',
        'profil_unit' => 'string',
        'profil_unit_nama' => 'string',
        'profil_jab' => 'string',
        'profil_jab_nama' => 'string',
        'profil_buat_tgl' => 'datetime',
        'profil_prop' => 'string',
    ];

    public function staf(){
        return $this->belongsTo(\App\Models\Staf::class, 'profil_staf');
    }
    public function unit(){
        return $this->belongsTo(\App\Models\Unit::class, 'profil_unit');
    }
    public function jab(){
        return $this->belongsTo(\App\Models\Jab::class, 'profil_jab');
    }
}
