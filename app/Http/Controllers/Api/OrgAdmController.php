<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\OrgAdm;
use Validator;

class OrgAdmController extends BaseController
{
    public function index()
    {
        if(OrgAdm::exists()){
            $orgadm = OrgAdm::all();

            foreach ($orgadm as $orgadms) {
                $data[] = [
                    'org_adm_id' => $orgadms->org_adm_id,
                    'org_adm_user' => $orgadms->usr->usr_nama,
                    'org_adm_org' => $orgadms->org->org_nama,
                    'org_adm_isaktif' => $orgadms->org_adm_isaktif,
                    'org_adm_ishapus' => $orgadms->org_adm_ishapus,
                    'org_adm_role' => $orgadms->org_adm_role,
                    'org_adm_prop' => $orgadms->org_adm_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Organisasi Admin Tidak Ditemukan.');
        }
        // return $this->sendResponse($orgadm, 'Organisasi Admin Successfully.');
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'org_adm_id' => 'required',
            'org_adm_user' => 'required',
            'org_adm_org' => 'required',
            'org_adm_isaktif' => 'required',
            'org_adm_ishapus' => 'required',
            'org_adm_role' => 'required',
            'org_adm_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $orgadm = OrgAdm::create($input);
        return $this->sendResponse($orgadm, 'Organisasi Admin Berhasil Disimpan.');
    }

    public function show($org_adm_id)
    {
        if(OrgAdm::where('org_adm_id',$org_adm_id)->exists()){
            $org_adm_id = OrgAdm::where('org_adm_id',$org_adm_id)->get();
            return $this->sendResponse($org_adm_id, 'Organisasi Admin Berhasil Ditemukan.');
        }else{
            return $this->sendError('Organisasi Admin Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $org_adm_id)
    {
        if(OrgAdm::where('org_adm_id',$org_adm_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'org_adm_id' => 'required',
                'org_adm_user' => 'required',
                'org_adm_org' => 'required',
                'org_adm_isaktif' => 'required',
                'org_adm_ishapus' => 'required',
                'org_adm_role' => 'required',
                'org_adm_prop' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            $orgadm = OrgAdm::where('org_adm_id',$org_adm_id)->update($input);
            return $this->sendResponse($orgadm, 'Organisasi Admin Berhasil Diupdate.');
        }else{
            return $this->sendError('Organisasi Admin No Update.');
        }
    }

    public function destroy($org_adm_id)
    {
        if(OrgAdm::where('org_adm_id',$org_adm_id)->exists()){
            $orgadm = OrgAdm::where('org_adm_id',$org_adm_id)->delete();
            return $this->sendResponse($orgadm, 'Organisasi Admin Berhasil Dihapus.');
        }else{
            return $this->sendError('Organisasi Admin Tidak Berhasil Dihapus.');
        }
    }
}
