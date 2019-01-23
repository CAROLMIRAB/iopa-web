<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Doctor::class, 30)->create()->each(function (App\Doctor $post) {
            $post->doctor_office()->attach([
                rand(1,5),
                rand(5,10)
            ]);
        });
    }
}
