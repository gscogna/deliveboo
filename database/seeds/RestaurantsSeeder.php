<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Restaurant;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker  $faker)
    {
      $users = User::all();
      $users_arr = $users->toArray();
      $users = Count($users_arr);

      for ($i = 0; $i < Count($users); $i++){
        $newRestaurant = new Restaurant ();
        $newRestaurant->nome = $faker->word();
        $nomeBeginner = $newRestaurant->nome;

        $nomePresente = Restaurant::where('nome',$nomeBeginner)->first();
        $cont = 1;
        while($nomePresente){
          $nomeBeginner = $nomeBeginner.'-'.$cont;
          $nomeBeginner = Post::where('nome',$nomeBeginner)->first();
            $cont++;
        }
        $newRestaurant->nome = $nomeBeginner;

        $newRestaurant->indirizzo = $faker->streetAddress();
        $newRestaurant->immagine = $faker->imageUrl(640, 480, 'restaurant', true);
        $newRestaurant->slug = Str::slug($newRestaurant->nome);

        $newRestaurant->user_id = $users_arr[$i];

        $newRestaurant->save();

      }
    }
}
