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
            DB::table('recruitment')->insert([
                'title' => $faker->sentence($nbWords = 6),
                'job_title'=>$faker->name,
    'job_description'=>$faker->paragraph($ndSentences = 6),
'job_requirements'=>$faker->paragraph($ndSentences = 6),
'welfare'=>$faker->paragraph($ndSentences = 6),
'job_work_place'=>$faker->paragraph($ndSentences = 6),
'quantity'=>5,
'additional_information'=>$faker->paragraph($ndSentences = 6),
'expiration'=>date('y/m/d', time() + 60 * 60 * 24 * 7),
            'created_at'=>date('y/m/d')]);
        }
    }
}
