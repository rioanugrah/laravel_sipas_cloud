<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\AuthSrc;
use \Carbon\Carbon;
use Validator;

class AuthSrcController extends BaseController
{
    public function index(){
        if(AuthSrc::exists()){
            $authsrc = AuthSrc::all();

            foreach ($authsrc as $authsrcs) {
                $data[] = [
                    'auth_src_id' => $authsrcs->auth_src_id,
                    'auth_src_usr' => $authsrcs->auth_src_usr,
                    'auth_src_provider' => $authsrcs->auth_src_provider,
                    'auth_src_prop' => $authsrcs->auth_src_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Auth Scr Tidak Ditemukan.');
        }
    }

    public function create(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'auth_src_id' => 'required',
            'auth_src_usr' => 'required',
            'auth_src_provider' => 'required',
            'auth_src_prop' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $authsrc = AuthSrc::create($input);
        // return response()->json($org);
        return $this->sendResponse($authsrc, 'AuthSrc Berhasil Disimpan.');
    }

    public function show($authsrc_id)
    {
        if(AuthSrc::where('authsrc_id',$authsrc_id)->exists()){
            $authsrc = AuthSrc::where('authsrc_id',$authsrc_id)->get();
            return $this->sendResponse($authsrc, 'AuthSrc Berhasil Ditemukan.');
        }else{
            return $this->sendError('AuthSrc Tidak Ditemukan.');
        }
    }

    public function edit(Request $request, $authsrc_id){
        if(AuthSrc::where('authsrc_id',$authsrc_id)->exists()){
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'auth_src_id' => 'required',
                'auth_src_usr' => 'required',
                'auth_src_provider' => 'required',
                'auth_src_prop' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
            $authsrc = AuthSrc::where('authsrc_id',$authsrc_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($authsrc, 'AuthSrc Berhasil Diupdate.');
        }else{
            return $this->sendError('AuthSrc No Update.');
        }
    }

    public function destroy($authsrc_id)
    {
        if(AuthSrc::where('authsrc_id',$authsrc_id)->exists()){
            $authsrc = AuthSrc::where('authsrc_id',$authsrc_id)->delete();
            return $this->sendResponse($profil, 'AuthSrc Berhasil Dihapus.');
        }else{
            return $this->sendError('AuthSrc Tidak Berhasil Dihapus.');
        }
    }
}
