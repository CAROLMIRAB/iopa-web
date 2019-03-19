<?php

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertOffices();
    }

    public function insertOffices(): void
    {
        $now = now();
        $offices = [
            ['Providencia', 'Av. Los Leones 391', '228760900', 'providencia', 'no-foto.png'],
            ['La Florida', 'Av. Vicuña Mackenna Oriente 6969, Piso 1', '226784800', 'la-florida', 'no-foto.png'],
            ['Santiago Centro', 'Paseo Huérfanos 1147 Piso 3, Of. 346', '223727060', 'santiago-centro', 'no-foto.png'],
            ['Buin', 'Santa María 201, Piso 2 Of. 201', '228760975', 'buin', 'no-foto.png'],
            ['Maipú', 'Av. Los Pajaritos 3195, Piso 16 Of. 1606', '228760980','maipu', 'no-foto.png']
        ];
        $offices = array_map(function ($office) use ($now) {
            return [
                'name' => $office[0],
                'address' => $office[1],
                'phone' => $office[2],
                'slug' => $office[3],
                'photo' => $office[4],
                'updated_at' => $now,
                'created_at' => $now
            ];
        }, $offices);
        \DB::table('offices')->insert($offices);
    }
}
