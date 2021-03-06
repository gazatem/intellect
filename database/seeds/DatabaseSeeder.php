<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersRolesSeeder::class);
        $this->call(ProductStatusTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PricingGroupTableSeeder::class);
        $this->call(ProductPriceTableSeeeder::class);
        $this->call(StockGroupTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductStockTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
