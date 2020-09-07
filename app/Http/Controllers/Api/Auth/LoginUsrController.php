<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Usr;
use \Carbon\Carbon;
use Validator;

class LoginUsrController extends BaseController
{
    public function Login(Request $request)
    {
        $input = $request->all();
        $user = Usr::where([
            'usr_email' => $request->input('usr_email'),
            'usr_sandi' => md5($request->input('usr_sandi'))
        ])->first();

        if($user){
            $lastmasuk = $user->update([
                'usr_lastmasuk' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Success',
                'data' => $user
            ]);
        }else{
            return response()->json([
                'message' => 'Gagal'
            ]);
        }
    }
}
