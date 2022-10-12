<?php

namespace Database\Seeders;

use App\Models\OrderSyahriah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = [
                'id' => Str::uuid(),
                'number' => '12345678',
                'total_price' => 1000000,
                'payment_status' => 1,
                'syahriah_id' => 'e4d51b59-5e7b-4149-a6b0-02eb13804c3f'
        ];
        OrderSyahriah::create($order);
    }
}
