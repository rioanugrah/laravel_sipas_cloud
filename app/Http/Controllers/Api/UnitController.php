<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitCakupan;
use Validator;

class UnitController extends BaseController
{
    public function index()
    {
        if(Unit::exists()){
            $unit = Unit::all();
    
            foreach ($unit as $units) {
                $data[] = [
                    'unit_id' => $units->unit_id,
                    'unit_nama' => $units->unit_nama,
                    'unit_kode' => $units->unit_kode,
                    'unit_rubrik' => $units->unit_rubrik,
                    'unit_isaktif' => $units->unit_isaktif,
                    'unit_org' => $units->org->org_nama,
                    'unit_induk' => $units->unit_induk,
                    'unit_ishapus' => $units->unit_ishapus,
                    'unit_manager' => $units->unit_manager,
                    'unit_level' => $units->unit_level,
                    'unit_path' => $units->unit_path,
                    'unit_prop' => $units->unit_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Unit Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'unit_id' => 'required',
            'unit_nama' => 'required',
            'unit_kode' => 'required',
            'unit_rubrik' => 'required',
            'unit_isaktif' => 'required',
            'unit_org' => 'required',
            'unit_induk' => 'required',
            'unit_ishapus' => 'required',
            'unit_manager' => 'required',
            'unit_level' => 'required',
            'unit_path' => 'required',
            'unit_prop' => 'required',
        ]);

        // UnitCakupan::create([
        //     'unit_cakupan_id' => 1,
        //     'unit_cakupan_unit' => $request->input('unit_id'),
        //     'unit_cakupan_jab' => 1
        // ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $unit = Unit::create($input);
        // return response()->json($org);
        return $this->sendResponse($unit, 'Unit Berhasil Disimpan.');
    }

    public function show($unit_id)
    {
        if(Unit::where('unit_id',$unit_id)->exists()){
            $unit = Unit::where('unit_id',$unit_id)->get();
            return $this->sendResponse($unit, 'Unit Berhasil Ditemukan.');
        }else{
            return $this->sendError('Unit Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $unit_id)
    {
        if(Unit::where('unit_id',$unit_id)->exists()){
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'unit_id' => 'required',
                'unit_nama' => 'required',
                'unit_kode' => 'required',
                'unit_rubrik' => 'required',
                'unit_isaktif' => 'required',
                'unit_org' => 'required',
                'unit_induk' => 'required',
                'unit_ishapus' => 'required',
                'unit_manager' => 'required',
                'unit_level' => 'required',
                'unit_path' => 'required',
                'unit_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            $unit = Unit::where('unit_id',$unit_id)->update($input);
    
            return $this->sendResponse($unit, 'Unit Berhasil DiUpdate.');
        }else{
            return $this->sendError('Unit No Update.');
        }
    }

    public function destroy($unit_id)
    {
        if(Unit::where('unit_id',$unit_id)->exists()){
            $unit = Unit::where('unit_id',$unit_id)->delete();
            return $this->sendResponse($unit, 'Unit Berhasil Dihapus.');
        }else{
            return $this->sendError('Unit Tidak Berhasil Dihapus.');
        }
    }
}
