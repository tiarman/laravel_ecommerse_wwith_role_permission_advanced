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
        // \App\Models\User::factory(10)->create();

      $this->call(PermissionSeeder::class);
      $this->call(RoleSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(CategoriesSeeder::class);
      $this->call(SubCategorySeeder::class);
      $this->call(ChildCategorySeeder::class);
      $this->call(BrandSeeder::class);
      $this->call(PickupPointSeeder::class);
      $this->call(WareHouseSeeder::class);
    }
}
