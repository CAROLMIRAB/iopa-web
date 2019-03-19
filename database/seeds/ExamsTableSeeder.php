<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Exam::class, 3)->create()->each(function (App\Exam $post) {
            $post->exam_office()->attach([
                rand(1,5),
                rand(1,5)
            ]);
        });
    }
}
