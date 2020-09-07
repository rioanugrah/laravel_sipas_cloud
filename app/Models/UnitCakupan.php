<?php

namespace App\Models;

use Eloquent as Model;

class UnitCakupan extends Model
{
    public $table = 'unitcakupan';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'unit_cakupan_id';

    public $fillable = [
        'unit_cakupan_id',
        'unit_cakupan_unit',
        'unit_cakupan_jab',
    ];

    protected $casts = [
        'unit_cakupan_id' => 'string',
        'unit_cakupan_unit' => 'string',
        'unit_cakupan_jab' => 'string',
    ];

    public function jab(){
        return $this->belongsTo(\App\Models\Jab::class, 'unit_cakupan_jab');
    }
    
    public function unit(){
        return $this->belongsTo(\App\Models\Unit::class, 'unit_cakupan_unit');
    }
}
