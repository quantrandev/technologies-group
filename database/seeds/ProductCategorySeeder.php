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

        for($i = 0; $i < 9; $i++){
            DB::table('news')->insert([
                'title' => $faker->sentence($nbWords = 6),
                'content' => '',
                'created_at' => date('y/m/d')
            ]);
        }
    }
}
