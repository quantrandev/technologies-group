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
            DB::table('menu')->insert([
               'title' => $faker->name,
               'href' => '',
               'cover_image' => '',
               'parent_id' => null,
               'is_active' => 1 
            ]);
        }
    }
}
