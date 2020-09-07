<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Jab;
use Validator;

class JabController extends BaseController
{
    public function index()
    {
        if(Jab::exists()){
            $jab = Jab::all();

            foreach ($jab as $jabs) {
                $data[] = [
                    'jab_id' => $jabs->jab_id,
                    'jab_nama' => $jabs->jab_nama,
                    'jab_isaktif' => $jabs->jab_isaktif,
                    'jab_isnomor' => $jabs->jab_isnomor,
                    'jab_org' => $jabs->org->org_nama,
                    'jab_induk' => $jabs->jab_induk,
                    'jab_ishapus' => $jabs->jab_ishapus,
                    'jab_level' => $jabs->jab_level,
                    'jab_path' => $jabs->jab_path,
                    'jab_prop' => $jabs->jab_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Jabatan Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'jab_id' => 'required',
            'jab_nama' => 'required',
            'jab_kode' => 'required',
            'jab_isaktif' => 'required',
            'jab_isnomor' => 'required',
            'jab_org' => 'required',
            'jab_induk' => 'required',
            'jab_ishapus' => 'required',
            'jab_level' => 'required',
            'jab_path' => 'required',
            'jab_prop' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $jab = Jab::create($input);
        return $this->sendResponse($jab, 'Jabatan Berhasil Disimpan.');
    }

    public function show($jab_id)
    {
        if(Jab::where('jab_id',$jab_id)->exists()){
            $jab = Jab::where('jab_id',$jab_id)->get();
            return $this->sendResponse($jab, 'Jabatan Berhasil Ditemukan.');
        }else{
            return $this->sendError('Jabatan Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $jab_id)
    {
        if(Jab::where('jab_id',$jab_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'jab_id' => 'required',
                'jab_nama' => 'required',
                'jab_kode' => 'required',
                'jab_isaktif' => 'required',
                'jab_isnomor' => 'required',
                'jab_org' => 'required',
                'jab_induk' => 'required',
                'jab_ishapus' => 'required',
                'jab_level' => 'required',
                'jab_path' => 'required',
                'jab_prop' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            $jab = Jab::where('jab_id',$jab_id)->update($input);
            return $this->sendResponse($jab, 'Jabatan Berhasil Diupdate.');
        }else{
            return $this->sendError('Jabatan No Update.');
        }
    }

    public function destroy($jab_id)
    {
        if(Jab::where('jab_id',$jab_id)->exists()){
            $jab = Jab::where('jab_id',$jab_id)->delete();
            return $this->sendResponse($jab, 'Jabatan Berhasil Dihapus.');
        }else{
            return $this->sendError('Jabatan Tidak Berhasil Dihapus.');
        }
    }
}
