<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = ['Accessoires', 'Logiciels', 'Ordinateurs', 'Composants'];
        for ($i = 0; $i < 20; $i++) {
            App\Article::create([
                'titre' => $faker->sentence(3, true),
                'design' => 'https://via.placeholder.com/200x250',
                'prix' => $faker->numberBetween(15, 300) * 100,
                'categorie' => $categories[mt_rand(0, count($categories) - 1)]
            ]);
        }
    }
}
