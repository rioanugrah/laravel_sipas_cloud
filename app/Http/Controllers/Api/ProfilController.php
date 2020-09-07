<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Profil;
use \Carbon\Carbon;
use Validator;

class ProfilController extends BaseController
{
    public function index(){
        if(Profil::exists()){
            $profil = Profil::all();
            return response()->json($profil);
        }else{
            return $this->sendError('Profil Tidak Ditemukan.');
        }
    }

    public function create(Request $request){
        $input = $request->all();
        $input['profil_buat_tgl'] = Carbon::now();
        $validator = Validator::make($input, [
            'profil_id' => 'required',
            'profil_staf' => 'required',
            'profil_staf_nama' => 'required',
            'profil_unit' => 'required',
            'profil_unit_nama' => 'required',
            'profil_jab' => 'required',
            'profil_jab_nama' => 'required',
            'profil_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $profil = Profil::create($input);
        // return response()->json($org);
        return $this->sendResponse($profil, 'Profile Berhasil Disimpan.');
    }

    public function show($profil_id)
    {
        if(Profil::where('profil_id',$profil_id)->exists()){
            $profil = Profil::where('profil_id',$profil_id)->get();
            return $this->sendResponse($profil, 'Profil Berhasil Ditemukan.');
        }else{
            return $this->sendError('Profil Tidak Ditemukan.');
        }
    }

    public function edit(Request $request){
        if(Profil::where('profil_id',$profil_id)->exists()){
            $input = $request->all();
            $input['profil_buat_tgl'] = Carbon::now();
    
            $validator = Validator::make($input, [
                'profil_id' => 'required',
                'profil_staf' => 'required',
                'profil_staf_nama' => 'required',
                'profil_unit' => 'required',
                'profil_unit_nama' => 'required',
                'profil_jab' => 'required',
                'profil_jab_nama' => 'required',
                'profil_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            $profil = Profil::where('profil_id',$profil_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($profil, 'Profil Berhasil Diupdate.');
        }else{
            return $this->sendError('Profil No Update.');
        }
    }

    public function destroy($profil_id)
    {
        if(Profil::where('profil_id',$profil_id)->exists()){
            $profil = Profil::where('profil_id',$profil_id)->delete();
            return $this->sendResponse($profil, 'Profil Berhasil Dihapus.');
        }else{
            return $this->sendError('Profil Tidak Berhasil Dihapus.');
        }
    }
}
