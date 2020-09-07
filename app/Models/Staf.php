<?php

namespace App\Models;

use Eloquent as Model;

class Staf extends Model
{
    public $table = 'staf';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'staf_id';

    public $fillable = [
        'staf_id',
        'staf_nama',
        'staf_peran',
        'staf_kode',
        'staf_isaktif',
        'staf_kelamin',
        'staf_ishapus',
        'staf_org',
        'staf_unit',
        'staf_jab',
        'staf_usr',
        'staf_profil',
        'staf_prop',
    ];

    protected $casts = [
        'staf_id' => 'string',
        'staf_nama' => 'string',
        'staf_peran' => 'string',
        'staf_kode' => 'string',
        'staf_isaktif' => 'integer',
        'staf_kelamin' => 'integer',
        'staf_ishapus' => 'integer',
        'staf_org' => 'string',
        'staf_unit' => 'string',
        'staf_jab' => 'string',
        'staf_usr' => 'string',
        'staf_profil' => 'string',
        'staf_prop' => 'string',
    ];

    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'staf_org');
    }
    public function unit(){
        return $this->belongsTo(\App\Models\Unit::class, 'staf_unit');
    }
    public function jab(){
        return $this->belongsTo(\App\Models\Jab::class, 'staf_jab');
    }
    public function usr(){
        return $this->belongsTo(\App\Models\Usr::class, 'staf_usr');
    }
    public function profil(){
        return $this->belongsTo(\App\Models\Profil::class, 'staf_profil');
    }
}
