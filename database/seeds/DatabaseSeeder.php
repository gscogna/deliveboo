<?php

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
      // $this->call(PlatesSeeder::class);
      // $this->call(RestaurantsSeeder::class);
      // $this->call(TypesSeeder::class);
      $this->call([
        TypesSeeder::class,
        PlateSeeder::class,
        // RestaurantsSeeder::class,
    ]);
    }
}
