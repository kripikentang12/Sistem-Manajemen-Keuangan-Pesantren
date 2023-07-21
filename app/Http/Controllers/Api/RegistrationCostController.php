<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CashBook;
use App\Models\OrderRegcost;
use App\Models\OrderSyahriah;
use App\Models\RegistrationCost;
use App\Models\Syahriah;
use Illuminate\Http\Request;

class RegistrationCostController extends Controller
{
    public function update_status(Request $request){
        try {
            $regcost_id = $request->id;
            $regcost = RegistrationCost::with('santris','orders')->where('id',$regcost_id)->first();
            $regcost->status = 'Sudah Dibayar';
            if ($regcost->save()){
                $order = OrderRegcost::where('registration_cost_id',$regcost_id)->first();
                $order->payment_status = 2;
                $order->save();
                CashBook::create([
                    'date' => now(),
                    'note' => 'Pembayaran Pendaftaran Santri ' . $regcost->santris->name,
                    'credit' => $regcost->orders->total_price,
                    'amount' => $regcost->orders->total_price,
                    'registration_cost_id' => $regcost->id
                ]);
            }
            $response = [
                'status'     => 'success',
                'message'    => 'Registration payment success',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
