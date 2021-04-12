<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker  $faker)
    {
        for($i = 0; $i < 5; $i++){
          $newType = new Type();
          $newType->name = $faker->word();
          $newType->immagine = $faker->imageUrl(640, 480, 'type', true);

          $newType->save();
        }
    }
}
