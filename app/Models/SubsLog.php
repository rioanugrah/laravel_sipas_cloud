<?php

namespace App\Models;

use Eloquent as Model;

class SubsLog extends Model
{
    public $table = 'subslog';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'subslog_id';

    public $fillable = [
        'subslog_id',
        'subslog_paket_nama',
        'subslog_paket_storage',
        'subslog_jumlah_user',
        'subslog_org',
        'subslog_jumlah_unit',
        'subslog_jabatan',
        'subslog_payment_id',
        'subslog_jumlah_surat',
        'subslog_jumlah_disposisi',
        'subslog_jumlah_arsip',
        'subslog_jumlah_dokumen',
        'subslog_payment_tgl',
        'subslog_prop',
    ];

    protected $casts = [
        'subslog_id' => 'string',
        'subslog_paket_nama' => 'string',
        'subslog_paket_storage' => 'integer',
        'subslog_jumlah_user' => 'integer',
        'subslog_org' => 'string',
        'subslog_jumlah_unit' => 'integer',
        'subslog_jabatan' => 'integer',
        'subslog_payment_id' => 'string',
        'subslog_jumlah_surat' => 'integer',
        'subslog_jumlah_disposisi' => 'integer',
        'subslog_jumlah_arsip' => 'integer',
        'subslog_jumlah_dokumen' => 'integer',
        'subslog_payment_tgl' => 'date',
        'subslog_prop' => 'string',
    ];

    public function paket(){
        return $this->belongsTo(\App\Models\Paket::class, 'subslog_paket_nama');
    }
    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'subslog_org');
    }
    public function payment(){
        return $this->belongsTo(\App\Models\Payment::class, 'subslog_payment_id');
    }
}
