<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Santri::factory()->create();
        // \App\Models\User::factory()->create();
        $this->call(SantrisTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CostsTableSeeder::class);
//        $this->call(OrdersTableSeeder::class);
    }
}
