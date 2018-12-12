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
        factory(App\Surgery::class, 30)->create();
    }
}
