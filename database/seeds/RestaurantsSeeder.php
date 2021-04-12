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
    // public function run(Faker  $faker)
    // {
      
    //   for ($i = 0; $i < 10; $i++){
    //     $userCount = Count(User::all()->toArray());
    //     for($j = 0; $j < $userCount; $j++ ){
    //       $newRestaurant->user_id = $userCount[$j];
    //     }

    //     $newRestaurant = new Restaurant ();
    //     $newRestaurant->nome = $faker->word();
    //     $nomeBeginner = $newRestaurant->nome;

    //     $nomePresente = Restaurant::where('nome',$nomeBeginner)->first();
    //     $cont = 1;
    //     while($nomePresente){
    //       $nomeBeginner = $nomeBeginner.'-'.$cont;
    //       $nomeBeginner = Restaurant::where('nome',$nomeBeginner)->first();
    //         $cont++;
    //     }
    //     $newRestaurant->nome = $nomeBeginner;

    //     $newRestaurant->indirizzo = $faker->streetAddress();
    //     $newRestaurant->immagine = $faker->imageUrl(640, 480, 'restaurant', true);
    //     $newRestaurant->slug = Str::slug($newRestaurant->nome);

    //     $newRestaurant->save();

    //   }
    // }

    public function run (Faker $faker){
      $users = User::all();

      for($i = 0; $i < Count($users); $i++){
        $newRestaurant = new Restaurant();
        $restaurantNome = $newRestaurant -> nome = $faker->word();
        $newRestaurant -> indirizzo = $faker->streetAddress();
        $newRestaurant -> immagine = $faker->word();
        $newRestaurant -> slug =  Str::slug($restaurantNome);
        // $userCount = Count(User::all()->toArray());
        // $newRestaurant -> user_id = rand(1, $userCount);

        // $userIniziale = $nome;
        // $userBase = Restaurant::where('nome', $nome)->first();
        $newRestaurant -> user_id = $users -> id[$i];
        $newRestaurant-> save();
      }
    }
}
