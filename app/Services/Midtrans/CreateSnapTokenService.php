<?php

namespace App\Services\Midtrans;

use App\Models\Syahriah;
use App\Models\User;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
//    protected $order;

//    public function __construct($order)
//    {
//        parent::__construct();
//
//        $this->order = $order;
//    }

    public function getSnapToken($syahriah_id)
    {
        $syahriah = Syahriah::with('santris','orders')->where('id',$syahriah_id)->first();
        $user = User::where('santri_id',$syahriah->santris->id)->first();
        $params = [
            'transaction_details' => [
//                'order_id' => $this->order->number,
//                'gross_amount' => $this->order->total_price,
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
}
