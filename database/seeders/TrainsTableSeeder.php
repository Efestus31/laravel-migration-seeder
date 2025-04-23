<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\it_IT\Company;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 20; $i++){
            Train::create([
                'azienda' => $faker->Company,
                'stazione_partenza' => $faker->city,
                'stazione_arrivo' => $faker->city,
                'orario_partenza' => $faker->time(),
                'orario_arrivo' => $faker->time(),
                'codice_treno' => strtoupper($faker->bothify('??###')),
                'carrozze_totali' => $faker->numberBetween(4, 15),
                'in_orario' => $faker->boolean(80),
                'cancellato' => $faker->boolean(10),
                'data_partenza' => $faker->dateTimeBetween('now', '+1 week')
            ]);
        }
    }
}
