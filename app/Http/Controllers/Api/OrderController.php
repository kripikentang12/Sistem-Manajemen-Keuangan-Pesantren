<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderSyahriah;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        try {
            $syahriah_id = $request->id;
            $order = OrderSyahriah::where('syahriah_id',$syahriah_id)->first();
//            $snapToken = $order->snap_token;
//            if (empty($snapToken)) {
                $midtrans = new CreateSnapTokenService($order);
                $snapToken = $midtrans->getSnapToken($syahriah_id);

                $order->snap_token = $snapToken;
                $order->save();

                $response = [
                    'status'     => 'success',
                    'message'    => 'Generate snap token get success',
                    'data'  => ['token' => $snapToken]
                ];
                return response()->json($response, 200);
//            }
//            $response = [
//                'status'     => 'success',
//                'message'    => 'Snap token already exist',
//            ];
//            return response()->json($response, 200);
        } catch (Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
