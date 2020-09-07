<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Paket;
use \Carbon\Carbon;
use Validator;

class PaketController extends BaseController
{
    public function index(){

        if(Paket::exists()){
            $paket = Paket::all();
            return response()->json($paket);
        }else{
            return $this->sendError('Paket Tidak Ditemukan.');
        }

    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'paket_id' => 'required',
            'paket_nama' => 'required',
            'paket_tipe' => 'required',
            'paket_ishapus' => 'required',
            'paket_isaktif' => 'required',
            'paket_nominal' => 'required',
            'paket_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $paket = Paket::create($input);
        // return response()->json($org);
        return $this->sendResponse($paket, 'Paket Berhasil Disimpan.');
    }

    public function show($paket_id)
    {
        if(Paket::where('paket_id',$paket_id)->exists()){
            $paket = Paket::where('paket_id',$paket_id)->get();
            return $this->sendResponse($paket, 'Paket Berhasil Ditemukan.');
        }else{
            return $this->sendError('Paket Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $paket_id){
        if(OrgAdm::where('org_adm_id',$org_adm_id)->exists()){
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'paket_id' => 'required',
                'paket_nama' => 'required',
                'paket_tipe' => 'required',
                'paket_ishapus' => 'required',
                'paket_isaktif' => 'required',
                'paket_nominal' => 'required',
                'paket_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            
            $paket = Paket::where('paket_id',$paket_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($paket, 'Paket Berhasil Diupdate.');
        }else{
            return $this->sendError('Paket No Update.');
        }
    }

    public function destroy($paket_id)
    {
        if(SubsLog::where('paket_id',$paket_id)->exists()){
            $paket = SubsLog::where('paket_id',$paket_id)->delete();
            return $this->sendResponse($paket, 'Paket Berhasil Dihapus.');
        }else{
            return $this->sendError('Paket Tidak Berhasil Dihapus.');
        }
    }
}
