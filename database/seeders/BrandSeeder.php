<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'brand_name' => 'Samsung',
            'brand_slug' => 'samsung',
            'front_page' => Brand::$frontPageArrays[1],
            'status' => Brand::$statusArrays[0],
        ]);
        Brand::create([
            'brand_name' => 'Sony',
            'brand_slug' => 'sony',
            'front_page' => Brand::$frontPageArrays[1],
            'status' => Brand::$statusArrays[0],
        ]);
        Brand::create([
            'brand_name' => 'RFL',
            'brand_slug' => 'rfl',
            'front_page' => Brand::$frontPageArrays[1],
            'status' => Brand::$statusArrays[0],
        ]);
    }
}
