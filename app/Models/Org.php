<?php

namespace App\Models;

use Eloquent as Model;

class Org extends Model
{
    public $table = 'org';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'org_id';

    public $fillable = [
        'org_id',
        'org_nama',
        'org_kode',
        'org_alamat',
        'org_telp',
        'org_usr',
        'org_ishapus',
        'org_isaktif',
        'org_aktif_akhir_tgl',
        'org_tenggang_akhir_tgl',
        'org_status',
        'org_tipe',
        'org_bidang',
        'org_provinsi',
        'org_kota',
        'org_induk',
        'org_paket',
        'org_prop',
    ];

    protected $casts = [
        'org_id' => 'string',
        'org_nama' => 'string',
        'org_kode' => 'string',
        'org_alamat' => 'string',
        'org_telp' => 'string',
        'org_usr' => 'string',
        'org_ishapus' => 'integer',
        'org_isaktif' => 'integer',
        'org_aktif_akhir_tgl' => 'date',
        'org_tenggang_akhir_tgl' => 'date',
        'org_status' => 'integer',
        'org_tipe' => 'string',
        'org_bidang' => 'string',
        'org_provinsi' => 'string',
        'org_kota' => 'string',
        'org_induk' => 'string',
        'org_paket' => 'string',
        'org_prop' => 'string',
    ];

    public static $rules = [
        'org_id' => 'required',
        // 'org_nama' => 'required',
        // 'org_kode' => 'required',
        // 'org_alamat' => 'required',
        // 'org_telpon' => 'required'
    ];

    public function paket()
    {
        return $this->belongsTo(\App\Models\Paket::class, 'org_paket');
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\Usr::class, 'org_usr');
    }
}
