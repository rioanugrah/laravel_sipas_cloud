<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\PropHapusData;
use \Carbon\Carbon;
use Validator;

class PropHapusDataController extends BaseController
{
    public function index()
    {
        $prophapusdata = PropHapusData::all();
        return response()->json($prophapusdata);
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'prop_id' => 'required',
            'prop_hapus' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $prophapusdata = PropHapusData::create($input);
        return $this->sendResponse($prophapusdata, 'Prop Hapus Data Berhasil Disimpan.');
    }
}
