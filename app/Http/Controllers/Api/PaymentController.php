<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Payment;
use \Carbon\Carbon;
use Validator;

class PaymentController extends BaseController
{
    public function index()
    {
        if(Payment::exists()){
            $payment = Payment::all();

            foreach ($payment as $payments) {
                $data[] = [
                    'payment_nomor' => $payments->payment_nomor,
                    'payment_user' => $payments->usr->usr_nama,
                    'payment_tgl' => $payments->payment_tgl,
                    'payment_nominal' => $payments->payment_nominal,
                    'payment_status' => $payments->payment_status,
                    'payment_org' => $payments->org->org_nama,
                    'payment_subslog' => $payments->payment_subslog,
                    'payment_prop' => $payments->payment_prop
                ];
            }
            return response()->json($data);
        }else{
            return $this->sendError('Payment Tidak Ditemukan.');
        }
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $input['payment_nomor'] = mt_rand(0,100000);
        $input['payment_tgl'] = Carbon::now();

        $validator = Validator::make($input, [
            'payment_id' => 'required',
            // 'payment_nomor' => 'required',
            'payment_user' => 'required',
            // 'payment_tgl' => 'required',
            'payment_nominal' => 'required',
            'payment_status' => 'required',
            'payment_org' => 'required',
            // 'payment_subslog' => 'required',
            'payment_prop' => 'required',
        ]); 

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $payment = Payment::create($input);
        // return response()->json($org);
        return $this->sendResponse('Payment Berhasil');
    }

    public function show($payment_id)
    {
        if(Payment::where('payment_id',$payment_id)->exists()){
            $payment = Payment::where('payment_id',$payment_id)->get();
            return $this->sendResponse($payment, 'Payment Berhasil Ditemukan.');
        }else{
            return $this->sendError('Payment Tidak Ditemukan.');
        }
    }

    public function edit(Request $request)
    {
        if(Payment::where('payment_id',$payment_id)->exists()){
            $input = $request->all();
            $input['payment_tgl'] = Carbon::now();
    
            $validator = Validator::make($input, [
                'payment_id' => 'required',
                'payment_nomor' => 'required',
                'payment_user' => 'required',
                // 'payment_tgl' => 'required',
                'payment_nominal' => 'required',
                'payment_status' => 'required',
                'payment_org' => 'required',
                'payment_subslog' => 'required',
                'payment_prop' => 'required',
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error', $validator->errors());
            }
    
            $payment = Payment::where('payment_id',$payment_id)->update($input);
            // return response()->json($org);
            return $this->sendResponse($payment, 'Payment Berhasil Diupdate.');
        }else{
            return $this->sendError('Payment No Update.');
        }
    }

    public function destroy($payment_id)
    {
        if(Payment::where('payment_id',$payment_id)->exists()){
            $payment = Payment::where('payment_id',$payment_id)->delete();
            return $this->sendResponse($payment, 'Payment Berhasil Dihapus.');
        }else{
            return $this->sendError('Payment Tidak Berhasil Dihapus.');
        }
    }
    
}
