<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Prop;
use \Carbon\Carbon;
use Validator;

class PropController extends BaseController
{
    public function index()
    {
        if(Prop::exists()){
            $prop = Prop::all();
            return response()->json($prop);
        }else{
            return $this->sendError('Prop Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $input['prop_buat_tgl'] = Carbon::now();

        // PropBuatData::create([
        //     'prop_id' => $request->input('prop_id')
        // ]);
        // PropUbahData::create([
        //     'prop_id' => $request->input('prop_id')
        // ]);
        // PropHapusData::create([
        //     'prop_id' => $request->input('prop_id')
        // ]);

        $prop = Prop::create($input);
        // return response()->json($org);
        return $this->sendResponse($prop, 'Prop Berhasil Disimpan.');
    }

    public function show($prop_id)
    {
        if(Prop::where('prop_id',$prop_id)->exists()){
            $prop = Prop::where('prop_id',$prop_id)->get();
            return $this->sendResponse($prop, 'Prop Berhasil Ditemukan.');
        }else{
            return $this->sendError('prop Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $prop_id)
    {
        if(OrgAdm::where('org_adm_id',$org_adm_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'prop_id' => 'required',
                'prop_buat_staf' => 'required',
                'prop_buat_tgl' => 'required',
                'prop_ubah_staf' => 'required',
                'prop_ubah_tgl' => 'required',
                'prop_hapus_staf' => 'required',
                'prop_hapus_tgl' => 'required',
                'prop_entitas_id' => 'required',
                'prop_entitas' => 'required',
                'prop_slug' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            $prop = Prop::where('prop_id',$prop_id)->update($input);
            return $this->sendResponse($prop, 'Prop Berhasil DiUpdate.');
        }else{
            return $this->sendError('Prop No Update.');
        }
    }

    public function destroy($prop_id)
    {
        if(Org::where('prop_id',$prop_id)->exists()){
            $prop = Org::where('prop_id',$prop_id)->delete();
            return $this->sendResponse($prop, 'Prop Berhasil Dihapus.');
        }else{
            return $this->sendError('Prop Tidak Berhasil Dihapus.');
        }
    }
}
