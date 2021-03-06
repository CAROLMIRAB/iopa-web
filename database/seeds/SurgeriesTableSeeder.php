<?php

use Illuminate\Database\Seeder;

class SurgeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Surgery::class, 3)->create()->each(function (App\Surgery $post) {
            $post->surgery_office()->attach([
                rand(1, 5),
                rand(1,5)
            ]);
        });
    }
}
