<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
       for ($i=0; $i < 20; $i++) {
        App\Client::create([
            'nom' => $faker->lastname,
            'prenom' => $faker->firstname,
            'age' => $faker->numberBetween(18,100),
            'adresse' => $faker->address,
            'ville' => $faker->city,
            'email' => $faker->email,
            'password' => Hash::make('password'),
        ]);
    }
    }
}
