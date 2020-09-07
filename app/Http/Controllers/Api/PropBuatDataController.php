<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Prop;
use App\Models\PropBuatData;
use \Carbon\Carbon;
use Validator;

class PropBuatDataController extends BaseController
{
    public function index()
    {
        $propbuatdata = PropBuatData::all();
        return response()->json($propbuatdata);
    }

    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'prop_id' => 'required',
            'prop_data' => 'required',
        ]);

        // Prop::create([
        //     'prop_id' => $request->input('prop_id'),
        //     'prop_buat_staf' => $request->input('prop_id'),
        //     'prop_buat_tgl' => Carbon::now()
        // ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $propbuatdata = PropBuatData::create($input);
        return $this->sendResponse($propbuatdata, 'Prop Buat Data Berhasil Disimpan.');
    }
}
