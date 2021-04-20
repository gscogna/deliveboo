<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// use Illuminate\Support\Str;
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
          // $newType = new Type();
          // $newType->nome = "Italiano";
          // $newType->immagine = $faker->imageUrl(640, 480, 'animals', true);
          // $newType->nome = "Giapponese";
          // $newType->immagine = $faker->imageUrl(640, 480, 'animals', true);

          $newTypes = [
            [
              'nome' => 'Italiano',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Giapponese',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Cinese',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Pizza',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Hamburger',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Pesce',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Vegetariano',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Vegano',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
            [
              'nome' => 'Indiano',
              'immagine' => $faker->imageUrl(640, 480, 'animals', true),
            ],
          ];

          for($i = 0; $i < 3; $i++){
            $newType = new Type();
            $newType -> nome = $newTypes[$i]['nome'];
            $newType -> immagine = $newTypes[$i]['immagine'];


            $newType->save();
          };



    }
}
