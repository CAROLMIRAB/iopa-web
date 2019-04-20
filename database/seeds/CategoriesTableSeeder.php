<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insert();
    }

    public function insert() : void
    {
        $now = now();
        $categories = [
            [1, 'Noticia', 'noticia'],
            [2, 'Servicio', 'servicio']
        ];

        $categories = array_map(function ($categories) use ($now) {
            return[
                'id' => $categories[0],
                'slug' => $categories[2],
                'name' => $categories[1],
                'updated_at' => $now,
                'created_at' => $now
            ];
        }, $categories);

        \DB::table('categories')->insert($categories);
    }
}
