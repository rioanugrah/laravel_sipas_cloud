<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\AuthSrc;
use App\Models\Usr;
use \Carbon\Carbon;
use Validator;

class UsrController extends BaseController
{
    public function index(){
        if(Usr::exists()){
            $usr = Usr::all();
            
            foreach ($usr as $usrs) {
                $data[] = [
                    'usr_id' => $usrs->usr_id,
                    'usr_nama' => $usrs->usr_nama,
                    'usr_sandi' => $usrs->usr_sandi,
                    'usr_isaktif' => $usrs->usr_isaktif,
                    'usr_registrasi_tgl' => $usrs->usr_registrasi_tgl,
                    'usr_registrasi_status' => $usrs->usr_registrasi_status,
                    'usr_staf' => $usrs->usr_staf,
                    'usr_org' => $usrs->usr_org,
                    'usr_auth' => $usrs->usr_auth,
                    'usr_ishapus' => $usrs->usr_ishapus,
                    'usr_lastmasuk' => $usrs->usr_lastmasuk,
                    'usr_prop' => $usrs->usr_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('User Tidak Ditemukan.');
        }
        // return $this->sendResponse($usr, 'User Successfully.');
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $input['usr_sandi'] = md5($request->input('usr_sandi'));
        $input['usr_registrasi_tgl'] = Carbon::now();
        $input['usr_lastmasuk'] = Carbon::now();
        $input['usr_isaktif'] = 1;
        $input['usr_registrasi_status'] = 1;
        $input['usr_ishapus'] = 0;

        // AuthSrc::create([
        //     'auth_src_id' => $input['usr_id'],
        //     'auth_src_usr' => $input['usr_nama']
        // ]);

        $validator = Validator::make($input, [
            'usr_id' => 'required',
            'usr_nama' => 'required',
            'usr_email' => 'required',
            'usr_sandi' => 'required',
            'usr_isaktif' => 'required',
            // 'usr_registrasi_tgl' => 'required',
            // 'usr_registrasi_status' => 'required',
            // 'usr_staf' => 'required',
            // 'usr_org' => 'required',
            // 'usr_auth' => 'required',
            'usr_ishapus' => 'required',
            // 'usr_lastmasuk' => 'required',
            // 'usr_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }
        $usr = Usr::create($input);
        return $this->sendResponse($usr, 'User Berhasil Disimpan.');
    }

    public function show($usr_id)
    {
        if(Usr::where('usr_id',$usr_id)->exists()){
            $usr = Usr::where('usr_id',$usr_id)->get();
            return $this->sendResponse($usr, 'User Berhasil Ditemukan.');
        }else{
            return $this->sendError('User Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $usr_id)
    {
        if(Usr::where('usr_id',$usr_id)->exists()){
            $input = $request->all();
            $validator = Validator::make($input, [
                'usr_id' => 'required',
                'usr_nama' => 'required',
                'usr_email' => 'required',
                'usr_sandi' => 'required',
                'usr_isaktif' => 'required',
                // 'usr_registrasi_tgl' => 'required',
                // 'usr_registrasi_status' => 'required',
                // 'usr_staf' => 'required',
                // 'usr_org' => 'required',
                // 'usr_auth' => 'required',
                'usr_ishapus' => 'required',
                // 'usr_lastmasuk' => 'required',
                // 'usr_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            // $usr = new Usr();
            $input['usr_sandi'] = md5($request->input('usr_sandi'));
            $input['usr_registrasi_tgl'] = Carbon::now();
            $input['usr_lastmasuk'] = Carbon::now();
    
            $usr = Usr::where('usr_id',$usr_id)->update($input);
    
            return $this->sendResponse($usr, 'User Berhasil DiUpdate.');
        }else{
            return $this->sendError('User Admin No Update.');
        }
    }

    public function destroy($usr_id)
    {
        if(Usr::where('usr_id',$usr_id)->exists()){
            $usr = Usr::where('usr_id',$usr_id)->delete();
            return $this->sendResponse($usr, 'User Berhasil Dihapus.');
        }else{
            return $this->sendError('User Tidak Berhasil Dihapus.');
        }
    }
}
