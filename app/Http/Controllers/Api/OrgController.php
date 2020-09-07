<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Org;
use Validator;

class OrgController extends BaseController
{
    public function index(){
        if(Org::exists()){
            $org = Org::all();

            foreach ($org as $orgs) {
                $data[] = [
                    'org_id' => $orgs->org_id,
                    'org_nama' => $orgs->org_nama,
                    'org_kode' => $orgs->org_kode,
                    'org_alamat' => $orgs->org_alamat,
                    'org_telp' => $orgs->org_telp,
                    'org_usr' => $orgs->user->usr_nama,
                    'org_ishapus' => $orgs->org_ishapus,
                    'org_isaktif' => $orgs->org_isaktif,
                    'org_aktif_akhir_tgl' => $orgs->org_aktif_akhir_tgl,
                    'org_tenggang_akhir_tgl' => $orgs->org_tenggang_akhir_tgl,
                    'org_status' => $orgs->org_status,
                    'org_bidang' => $orgs->org_bidang,
                    'org_provinsi' => $orgs->org_provinsi,
                    'org_kota' => $orgs->org_kota,
                    'org_induk' => $orgs->org_induk,
                    'org_paket' => $orgs->paket->paket_nama,
                    'org_prop' => $orgs->org_prop,
                    // 'org_jml_usr' => $orgs->count(),
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Organisasi Tidak Ditemukan.');
        }
        // return $this->sendResponse($org, 'Organisasi Successfully.');
    }
    
    public function create(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'org_id' => 'required',
            'org_nama' => 'required',
            'org_kode' => 'required',
            'org_alamat' => 'required',
            'org_telp' => 'required',
            'org_usr' => 'required',
            'org_ishapus' => 'required',
            'org_isaktif' => 'required',
            'org_aktif_akhir_tgl' => 'required',
            'org_tenggang_akhir_tgl' => 'required',
            'org_status' => 'required',
            'org_tipe' => 'required',
            'org_bidang' => 'required',
            'org_provinsi' => 'required',
            'org_kota' => 'required',
            // 'org_induk' => 'required',
            // 'org_paket' => 'required',
            // 'org_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $org = Org::create($input);
        // return response()->json($org);
        return $this->sendResponse($org, 'Organisasi Berhasil Disimpan.');
    }

    public function show($org_id)
    {
        if(Org::where('org_id',$org_id)->exists()){
            $org = Org::where('org_id',$org_id)->get();
            return $this->sendResponse($org, 'Organisasi Berhasil Ditemukan.');
        }else{
            return $this->sendError('Organisasi Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $org_id)
    {
        if(Org::where('org_id',$org_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'org_id' => 'required',
                'org_nama' => 'required',
                'org_kode' => 'required',
                'org_alamat' => 'required',
                'org_telp' => 'required',
                'org_usr' => 'required',
                'org_ishapus' => 'required',
                'org_isaktif' => 'required',
                'org_aktif_akhir_tgl' => 'required',
                'org_tenggang_akhir_tgl' => 'required',
                'org_status' => 'required',
                'org_tipe' => 'required',
                'org_bidang' => 'required',
                'org_provinsi' => 'required',
                'org_kota' => 'required',
                // 'org_induk' => 'required',
                // 'org_paket' => 'required',
                // 'org_prop' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            $org = Org::where('org_id',$org_id)->update($input);
            return $this->sendResponse($org, 'Organisasi Berhasil DiUpdate.');
        }else{
            return $this->sendError('Organisasi No Update.');
        }


    }

    public function destroy($org_id)
    {
        if(Org::where('org_id',$org_id)->exists()){
            $org = Org::where('org_id',$org_id)->delete();
            return $this->sendResponse($org, 'Organisasi Berhasil Dihapus.');
        }else{
            return $this->sendError('Organisasi Tidak Berhasil Dihapus.');
        }
    }
}
