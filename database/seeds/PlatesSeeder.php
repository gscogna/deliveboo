<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use App\Plate;

class PlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $newPlate = new Plate;
            $newPlate ->nome = $faker->word();
            $newPlate ->immagine = $faker->imageUrl(640, 480, 'animals', true);
            $newPlate ->prezzo = $faker->randomFloat(2, 1, 10);
            $newPlate ->ingredienti = $faker->word();
            $newPlate ->visibile = $faker->boolean();
            $usersCount = Count(Restaurant::all()->toArray());
            $newPlate ->user_id = rand(1, $usersCount);

            $newPlate-> save();
        }
    }
}
