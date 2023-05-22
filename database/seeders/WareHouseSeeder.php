<?php

namespace Database\Seeders;

use App\Models\WareHouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WareHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WareHouse::create([
            'warehouse_name' => 'Big Bazar',
            'warehouse_address' => 'Rampura Dhaka',
            'warehouse_phone' => '01987676655',
            'status' => WareHouse::$statusArrays[0],
        ]);
        WareHouse::create([
            'warehouse_name' => 'Anondo Bazar',
            'warehouse_address' => 'Malibagh',
            'warehouse_phone' => '01877665544',
            'status' => WareHouse::$statusArrays[0],
        ]);
        WareHouse::create([
            'warehouse_name' => 'RL Bazar',
            'warehouse_address' => 'Bonani Dhaka',
            'warehouse_phone' => '09877665544',
            'status' => WareHouse::$statusArrays[0],
        ]);
    }
}
