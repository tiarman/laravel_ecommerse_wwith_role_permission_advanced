<?php

namespace Database\Seeders;

use App\Models\ChildCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildCategory::create([
            'category_id' => '1',
            'subcategory_id' => '1',
            'childcategory_name' => 'Samsung',
            'childcategory_slug' => 'samsung',
            'status' => ChildCategory::$statusArrays[0],
        ]);
        ChildCategory::create([
            'category_id' => '2',
            'subcategory_id' => '2',
            'childcategory_name' => 'Iphone 10 Max Pro',
            'childcategory_slug' => 'iphone',
            'status' => ChildCategory::$statusArrays[0],
        ]);
        ChildCategory::create([
            'category_id' => '3',
            'subcategory_id' => '3',
            'childcategory_name' => 'Intel core i7',
            'childcategory_slug' => 'desktop',
            'status' => ChildCategory::$statusArrays[0],
        ]);
    }
}
