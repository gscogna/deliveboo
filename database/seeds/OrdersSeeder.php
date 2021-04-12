<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for($i = 0; $i < 10; $i++){
          $newOrder = new Order;

          $newOrder ->prezzo_totale = $faker->randomFloat(2, 1, 1000);
          $newOrder ->indirizzo_consegna = $faker->streetAddress();
          $newOrder ->pagamento_avvenuto = $faker->boolean();
          $usersCount = Count(User::all()->toArray());
          $newOrder ->user_id = rand(1, $usersCount);

          $newOrder-> save();
      }
    }
}
