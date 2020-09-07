<?php

namespace App\Models;

use Eloquent as Model;

class OrgRole extends Model
{
    public $table = 'orgrole';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'org_role_id';

    public $fillable = [
        'org_role_id',
        'org_role_nama',
        'org_role_isaktif',
        'org_role_akses',
        'org_role_ishapus',
        'org_role_prop',
    ];

    protected $casts = [
        'org_role_id' => 'string',
        'org_role_nama' => 'string',
        'org_role_isaktif' => 'integer',
        'org_role_akses' => 'string',
        'org_role_ishapus' => 'integer',
        'org_role_prop' => 'string',
    ];
}
