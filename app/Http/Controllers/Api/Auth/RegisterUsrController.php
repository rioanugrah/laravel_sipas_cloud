<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Usr;
use \Carbon\Carbon;
use Validator;

class RegisterUsrController extends BaseController
{
    public function Register(Request $request)
    {
        $input = $request->all();
        $input['usr_sandi'] = md5($request->input('usr_sandi'));
        $input['usr_registrasi_tgl'] = Carbon::now();
        $input['usr_lastmasuk'] = Carbon::now();
        $input['usr_isaktif'] = 1;
        $input['usr_registrasi_status'] = 1;
        $input['usr_ishapus'] = 0;

        $validator = Validator::make($input, [
            'usr_id' => 'required',
            'usr_nama' => 'required',
            'usr_email' => 'required',
            'usr_sandi' => 'required',
            'usr_isaktif' => 'required',
            'usr_ishapus' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $usr = Usr::create($input);
        return $this->sendResponse($usr, 'User Berhasil Disimpan.');
    }
}
