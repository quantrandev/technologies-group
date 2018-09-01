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
            DB::table('customer')->insert([
                'name' => $faker->name,
                'logo' => '',
                'homepage' => $faker->url
            ]);
        }
    }
}
