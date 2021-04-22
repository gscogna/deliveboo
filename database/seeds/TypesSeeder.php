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
              'immagine' => "https://c.ndtvimg.com/2020-04/dih4ifhg_pasta_625x300_22_April_20.jpg",
            ],
            [
              'nome' => 'Giapponese',
              'immagine' => "https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/07/piatti-cucina-giapponese.jpg?w=744&h=418&a=c",
            ],
            [
              'nome' => 'Cinese',
              'immagine' => "https://wips.plug.it/cips/paginegialle.it/magazine/cms/2018/07/piatti-tipici-cinesi.jpg?w=744&h=418&a=c",
            ],
            [
              'nome' => 'Pizza',
              'immagine' => "https://www.esca.it/uploads/grandi/156320026781850.jpg",
            ],
            [
              'nome' => 'Hamburger',
              'immagine' => "https://media.istockphoto.com/photos/hamburger-with-cheese-and-french-fries-picture-id1188412964?k=6&m=1188412964&s=612x612&w=0&h=860S0kVoWTA60T4wakI8HLv-Y3fFw9jOKLSB4quEkIE=",
            ],
            [
              'nome' => 'Messicano',
              'immagine' =>"https://ilfattoalimentare.it/wp-content/uploads/2013/11/cibo-messico-153859601.jpg",
            ],
            [
              'nome' => 'Vegetariano',
              'immagine' => "https://qul.imgix.net/8f770481-80bf-4a9a-999e-8561ab3513c9/529430_sld.jpg",
            ],
            [
              'nome' => 'Vegano',
              'immagine' => "https://foodandnutrition.org/wp-content/uploads/big-bowl-vegetables-1047798504-1-780x520.jpg",
            ],
            [
              'nome' => 'Indiano',
              'immagine' => "https://i.pinimg.com/originals/2d/b2/69/2db269005db3400cced1ee4b608ce47f.jpg",
            ],
            [
              'nome' => 'Pesce',
              'immagine' => "https://www.vistanet.it/cagliari/wp-content/uploads/sites/2/2019/05/gamberoni-770x480.jpg",
            ],
          ];

          for($i = 0; $i < 10; $i++){
            $newType = new Type();
            $newType -> nome = $newTypes[$i]['nome'];
            $newType -> immagine = $newTypes[$i]['immagine'];


            $newType->save();
          };



    }
}
