<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\PropUbahData;
use \Carbon\Carbon;
use Validator;

class PropUbahDataController extends BaseController
{
    public function index()
    {
        $propubahdata = PropUbahData::all();
        return response()->json($propubahdata);
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'prop_id' => 'required',
            'prop_data' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $propubahdata = PropUbahData::create($input);
        return $this->sendResponse($propubahdata, 'Prop Ubah Data Berhasil Disimpan.');
    }
}
