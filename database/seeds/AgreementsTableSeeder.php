<?php

use Illuminate\Database\Seeder;

class AgreementsTableSeeder extends Seeder
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
        $agreements = [
            [1, 'fonasa', 'Fonasa', '', '[]'],
            [2, 'isapres', 'Isapres', '', '[]'],
            [3, 'convenios', 'Convenios', '', '[]'],
            [4, 'promociones', 'Promociones', '', '[]'],
            [5, 'aranceles', 'Arenceles', '', '[]'],
            [6, 'medios-pagos', 'Medios de Pago', '', '[]']
        ];

        $agreements = array_map(function ($agreement) use ($now) {
            return[
                'id' => $agreement[0],
                'slug' => $agreement[1],
                'name' => $agreement[2],
                'description' => $agreement[3],
                'content' => $agreement[4],
                'status' => 'INACTIVE',
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $agreements);

        \DB::table('agreements')->insert($agreements);
    }
}
