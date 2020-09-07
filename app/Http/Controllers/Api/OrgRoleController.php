<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\OrgRole;
use Validator;

class OrgRoleController extends BaseController
{
    public function index()
    {
        if(OrgRole::exists()){
            $orgrole = OrgRole::all();

            foreach ($orgrole as $orgroles) {
                $data[] = [
                    'org_role_id' => $orgroles->org_role_id,
                    'org_role_nama' => $orgroles->org_role_nama,
                    'org_role_isaktif' => $orgroles->org_role_nama,
                    'org_role_akses' => $orgroles->org_role_akses,
                    'org_role_ishapus' => $orgroles->org_role_ishapus,
                    'org_role_prop' => $orgroles->org_role_prop
                ];
            }
            // return $this->sendResponse($orgrole, 'Organisasi Role Successfully.');
            return response()->json($orgrole);
        }else{
            return $this->sendError('Org Role Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'org_role_id' => 'required',
            'org_role_nama' => 'required',
            'org_role_isaktif' => 'required',
            'org_role_akses' => 'required',
            'org_role_ishapus' => 'required',
            'org_role_prop' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $orgrole = OrgRole::create($input);
        return $this->sendResponse($orgrole, 'Organisasi Role Berhasil Disimpan.');
    }

    public function show($org_role_id)
    {
        if(OrgRole::where('org_role_id',$org_role_id)->exists()){
            $orgrole = OrgRole::where('org_role_id',$org_role_id)->get();
            return $this->sendResponse($orgrole, 'Organisasi Role Berhasil Ditemukan.');
        }else{
            return $this->sendError('Organisasi Role Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $org_role_id)
    {
        if(OrgRole::where('org_role_id',$org_role_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'org_role_id' => 'required',
                'org_role_nama' => 'required',
                'org_role_isaktif' => 'required',
                'org_role_akses' => 'required',
                'org_role_ishapus' => 'required',
                'org_role_prop' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            $orgrole = OrgRole::where('org_role_id',$org_role_id)->update($input);
            return $this->sendResponse($orgrole, 'Organisasi Role Berhasil Diupdate.');
        }else{
            return $this->sendError('Organisasi Role No Update.');
        }
    }

    public function destroy($org_role_id)
    {
        if(OrgRole::where('org_role_id',$org_role_id)->exists()){
            $orgrole = OrgRole::where('org_role_id',$org_role_id)->delete();
            return $this->sendResponse($orgrole, 'Organisasi Role Berhasil Dihapus.');
        }else{
            return $this->sendError('Organisasi Role Tidak Berhasil Dihapus.');
        }
    }
}
