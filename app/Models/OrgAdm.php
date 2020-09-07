<?php

namespace App\Models;

use Eloquent as Model;

class OrgAdm extends Model
{
    public $table = 'orgadm';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'org_adm_id';

    public $fillable = [
        'org_adm_id',
        'org_adm_user',
        'org_adm_org',
        'org_adm_isaktif',
        'org_adm_ishapus',
        'org_adm_role',
        'org_adm_prop',
    ];

    protected $casts = [
        'org_adm_id' => 'string',
        'org_adm_user' => 'string',
        'org_adm_org' => 'string',
        'org_adm_isaktif' => 'integer',
        'org_adm_ishapus' => 'integer',
        'org_adm_role' => 'string',
        'org_adm_prop' => 'string',
    ];

    public function usr(){
        return $this->belongsTo(\App\Models\Usr::class, 'org_adm_user');
    }

    public function org(){
        return $this->belongsTo(\App\Models\Org::class, 'org_adm_org');
    }
}
