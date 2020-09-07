<?php

namespace App\Models;

use Eloquent as Model;

class Jab extends Model
{
    public $table = 'jab';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'jab_id';

    public $fillable = [
        'jab_id',
        'jab_nama',
        'jab_kode',
        'jab_isaktif',
        'jab_isnomor',
        'jab_org',
        'jab_induk',
        'jab_ishapus',
        'jab_level',
        'jab_path',
        'jab_prop',
    ];

    protected $casts = [
        'jab_id' => 'string',
        'jab_nama' => 'string',
        'jab_kode' => 'string',
        'jab_isaktif' => 'integer',
        'jab_isnomor' => 'integer',
        'jab_org' => 'string',
        'jab_induk' => 'string',
        'jab_ishapus' => 'integer',
        'jab_level' => 'integer',
        'jab_path' => 'integer',
        'jab_prop' => 'string',
    ];

    public static $rules = [
        'jab_id' => 'required',
        'jab_nama' => 'required',
        'jab_kode' => 'required',
        'jab_isaktif' => 'required',
        'jab_isnomor' => 'required',
        'jab_org' => 'required',
        'jab_induk' => 'required',
        'jab_ishapus' => 'required',
        'jab_level' => 'required',
        'jab_path' => 'required',
        'jab_prop' => 'required',
    ];

    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'jab_org');
    }
}
