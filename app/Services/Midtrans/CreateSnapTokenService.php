<?php

namespace App\Services\Midtrans;

use App\Models\RegistrationCost;
use App\Models\Syahriah;
use App\Models\User;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{

    public function getSnapToken($syahriah_id)
    {
        $syahriah = Syahriah::with('santris','orders')->where('id',$syahriah_id)->first();
        $user = User::where('santri_id',$syahriah->santris->id)->first();
        $params = [
            'transaction_details' => [
                'order_id' => $syahriah->orders->number,
                'gross_amount' => $syahriah->spp,
            ],
            'item_details' => [
                [
                    'id' => $syahriah->id,
                    'price' => $syahriah->spp,
                    'quantity' => 1,
                    'name' => 'Pembayaran Syahriah (SPP) '.$syahriah->month.'-'.$syahriah->year,
                ]
            ],
            'customer_details' => [
                'first_name' => $syahriah->santris->name,
                'email' => $user->email,
                'phone' => $syahriah->santris->phone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }

    public function getSnapToken2($regcost_id)
    {
        $regcost = RegistrationCost::with('santris','orders')->where('id',$regcost_id)->first();
        $user = User::where('santri_id',$regcost->santris->id)->first();
        $params = [
            'transaction_details' => [
                'order_id' => $regcost->orders->number,
                'gross_amount' => $regcost->orders->total_price,
            ],
            'item_details' => [
                [
                    'id' => $regcost->id,
                    'price' => $regcost->orders->total_price,
                    'quantity' => 1,
                    'name' => 'Pembayaran Biaya Registrasi '.$regcost->santris->name,
                ]
            ],
            'customer_details' => [
                'first_name' => $regcost->santris->name,
                'email' => $user->email,
                'phone' => $regcost->santris->phone,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
