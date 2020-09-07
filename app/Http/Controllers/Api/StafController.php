<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Staf;
use Validator;

class StafController extends BaseController
{
    public function index(){
        if(Staf::all()){
            $staf = Staf::all();

            foreach ($staf as $staff) {
                $data[] = [
                    'staf_id' => $staff->staf_id,
                    'staf_nama' => $staff->staf_nama,
                    'staf_peran' => $staff->staf_peran,
                    'staf_kode' => $staff->staf_kode,
                    'staf_isaktif' => $staff->staf_isaktif,
                    'staf_kelamin' => $staff->staf_kelamin,
                    'staf_ishapus' => $staff->staf_ishapus,
                    'staf_org' => $staff->org->org_nama,
                    'staf_unit' => $staff->unit->unit_nama,
                    'staf_jab' => $staff->jab->jab_nama,
                    'staf_usr' => $staff->usr->usr_nama,
                    'staf_profil' => $staff->profil->profil_staf_nama,
                    'staf_prop' => $staff->staf_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Staf Tidak Ditemukan.');
        }
        // return $this->sendResponse($org, 'Organisasi Successfully.');
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'staf_id' => 'required',
            'staf_nama' => 'required',
            'staf_peran' => 'required',
            'staf_kode' => 'required',
            'staf_isaktif' => 'required',
            'staf_kelamin' => 'required',
            'staf_ishapus' => 'required',
            'staf_org' => 'required',
            'staf_unit' => 'required',
            'staf_jab' => 'required',
            'staf_usr' => 'required',
            'staf_profil' => 'required',
            'staf_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $staf = Staf::create($input);
        // return response()->json($org);
        return $this->sendResponse($staf, 'Staf Berhasil Disimpan.');
    }

    public function show($staf_id)
    {
        if(Staf::where('staf_id',$staf_id)->exists()){
            $staf = Staf::where('staf_id',$staf_id)->get();
            return $this->sendResponse($staf, 'Staf Berhasil Ditemukan.');
        }else{
            return $this->sendError('Staf Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $staf_id)
    {
        if(Staf::where('staf_id',$staf_id)->exists()){
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'staf_id' => 'required',
                'staf_nama' => 'required',
                'staf_peran' => 'required',
                'staf_kode' => 'required',
                'staf_isaktif' => 'required',
                'staf_kelamin' => 'required',
                'staf_ishapus' => 'required',
                'staf_org' => 'required',
                'staf_unit' => 'required',
                'staf_jab' => 'required',
                'staf_usr' => 'required',
                'staf_profil' => 'required',
                'staf_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            $staf = Staf::where('staf_id',$staf_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($staf, 'Staf Berhasil Diupdate.');
        }else{
            return $this->sendError('Staf No Update.');
        }
    }

    public function destroy($staf_id)
    {
        if(Staf::where('staf_id',$staf_id)->exists()){
            $staf = Staf::where('staf_id',$staf_id)->delete();
            return $this->sendResponse($staf, 'Staf Berhasil Dihapus.');
        }else{
            return $this->sendError('Staf Tidak Berhasil Dihapus.');
        }
    }
}
