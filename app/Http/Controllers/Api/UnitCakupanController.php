<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\UnitCakupan;
use Validator;

class UnitCakupanController extends BaseController
{
    public function index()
    {
        if(UnitCakupan::exists()){
            $unitcakupan = UnitCakupan::all();
    
            foreach ($unitcakupan as $unitcakupans) {
                $data[] = [
                    'unit_cakupan_id' => $unitcakupans->unit_cakupan_id,
                    'unit_cakupan_unit' => $unitcakupans->unit->unit_nama,
                    'unit_cakupan_jab' => $unitcakupans->jab->jab_nama
                ];
            }
    
            return response()->json($data);
        }else{
            return $this->sendError('Unit Cakupan Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'unit_cakupan_id' => 'required',
            'unit_cakupan_unit' => 'required',
            'unit_cakupan_jab' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $unitcakupan = UnitCakupan::create($input);
        // return response()->json($org);
        return $this->sendResponse($unitcakupan, 'Unit Cakupan Berhasil Disimpan.');
    }

}
