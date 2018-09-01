<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 9; $i++) {
            DB::table('subsidiary')->insert([
               'name' => $faker->name,
               'homepage' => $faker->url,
               'description' => $faker->sentence($nbWords = 6),
               'is_active' => 1 
            ]);
        }
    }
}
