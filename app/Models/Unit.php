<?php

namespace App\Models;

use Eloquent as Model;

class Unit extends Model
{
    public $table = 'unit';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'unit_id';

    public $fillable = [
        'unit_id',
        'unit_nama',
        'unit_kode',
        'unit_rubrik',
        'unit_isaktif',
        'unit_org',
        'unit_induk',
        'unit_ishapus',
        'unit_manager',
        'unit_level',
        'unit_path',
        'unit_prop',
    ];

    protected $casts = [
        'unit_id' => 'string',
        'unit_nama' => 'string',
        'unit_kode' => 'string',
        'unit_rubrik' => 'string',
        'unit_isaktif' => 'integer',
        'unit_org' => 'string',
        'unit_induk' => 'string',
        'unit_ishapus' => 'integer',
        'unit_manager' => 'string',
        'unit_level' => 'string',
        'unit_path' => 'string',
        'unit_prop' => 'string',
    ];

    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'unit_org');
    }
}
