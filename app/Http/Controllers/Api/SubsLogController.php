<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\SubsLog;
use \Carbon\Carbon;
use Validator;

class SubsLogController extends BaseController
{
    public function index(){
        if(SubsLog::exists()){
            $subslog = SubsLog::all();

            foreach ($subslog as $subslogs) {
                $data[] = [
                    'subslog_paket_nama' => $subslogs->paket->paket_nama,
                    'subslog_paket_storage' => $subslogs->subslog_paket_storage,
                    'subslog_jumlah_user' => $subslogs->subslog_jumlah_user,
                    'subslog_org' => $subslogs->org->org_nama,
                    'subslog_jumlah_unit' => $subslogs->subslog_jumlah_unit,
                    'subslog_jumlah_jabatan' => $subslogs->subslog_jumlah_jabatan,
                    'subslog_payment_id' => $subslogs->payment->payment_nomor,
                    'subslog_jumlah_surat' => $subslogs->subslog_jumlah_surat,
                    'subslog_jumlah_disposisi' => $subslogs->subslog_jumlah_disposisi,
                    'subslog_jumlah_arsip' => $subslogs->subslog_jumlah_arsip,
                    'subslog_jumlah_dokumen' => $subslogs->subslog_jumlah_dokumen,
                    'subslog_payment_tgl' => $subslogs->subslog_payment_tgl,
                    'subslog_prop' => $subslogs->subslog_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Subs Log Tidak Ditemukan.');
        }
    }

    public function create(Request $request){
        $input = $request->all();
        $input['subslog_payment_tgl'] = Carbon::now();

        $validator = Validator::make($input, [
            'subslog_id' => 'required',
            'subslog_paket_nama' => 'required',
            'subslog_paket_storage' => 'required',
            'subslog_jumlah_user' => 'required',
            'subslog_org' => 'required',
            'subslog_jumlah_unit' => 'required',
            'subslog_jabatan' => 'required',
            'subslog_payment_id' => 'required',
            'subslog_jumlah_surat' => 'required',
            'subslog_jumlah_disposisi' => 'required',
            'subslog_jumlah_arsip' => 'required',
            'subslog_jumlah_dokumen' => 'required',
            // 'subslog_payment_tgl' => 'required',
            'subslog_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $subslog = SubsLog::create($input);
        // return response()->json($org);
        return $this->sendResponse($subslog, 'SubsLog Berhasil Disimpan.');
    }

    public function show($subslog_id)
    {
        if(SubsLog::where('subslog_id',$subslog_id)->exists()){
            $subslog = SubsLog::where('subslog_id',$subslog_id)->get();
            return $this->sendResponse($subslog, 'Subslog Berhasil Ditemukan.');
        }else{
            return $this->sendError('Subslog Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $subslog_id){
        if(SubsLog::where('subslog_id',$subslog_id)->exists()){
            $input = $request->all();
            $input['subslog_payment_tgl'] = Carbon::now();
    
            $validator = Validator::make($input, [
                'subslog_id' => 'required',
                'subslog_paket_nama' => 'required',
                'subslog_paket_storage' => 'required',
                'subslog_jumlah_user' => 'required',
                'subslog_org' => 'required',
                'subslog_jumlah_unit' => 'required',
                'subslog_jabatan' => 'required',
                'subslog_payment_id' => 'required',
                'subslog_jumlah_surat' => 'required',
                'subslog_jumlah_disposisi' => 'required',
                'subslog_jumlah_arsip' => 'required',
                'subslog_jumlah_dokumen' => 'required',
                // 'subslog_payment_tgl' => 'required',
                'subslog_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            
            $subslog = SubsLog::where('subslog_id',$subslog_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($subslog, 'SubsLog Berhasil Diupdate.');
        }else{
            return $this->sendError('SubsLog No Update.');
        }
    }

    public function destroy($subslog_id)
    {
        if(SubsLog::where('subslog_id',$subslog_id)->exists()){
            $subslog = SubsLog::where('subslog_id',$subslog_id)->delete();
            return $this->sendResponse($subslog, 'SubsLog Berhasil Dihapus.');
        }else{
            return $this->sendError('SubsLog Tidak Berhasil Dihapus.');
        }
    }
}
