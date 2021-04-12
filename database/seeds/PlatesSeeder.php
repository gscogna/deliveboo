<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Plate;

class PlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker  $faker)
    {
        for ($i = 0; $i < 20; $i++){
          $newPlate = new Plate();
          $newPlate->nome = $faker->word();
          $newPlate->prezzo = $faker->randomFloat(2, 1, 30);
          $newPlate->immagine = $faker->imageUrl(640, 480, 'plate', true);
          $newPlate->ingredienti = $faker->words();
          $newPlate->visibile = $faker->boolean();
          $users = User::all();
          $users = $users->toArray();
          $users = Count($users);
          $newPlate->user_id = rand(1,$users);

          $newPlate->save();
        }
    }
}
