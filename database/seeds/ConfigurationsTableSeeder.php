<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\DB::table('configurations')->get()->count() == 0) 
        {
            \DB::table('configurations')->insert([
                [
                    'title' => 'title',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'descripcion',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'logo',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'call_center',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'whatsapp',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'facebook',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'twitter',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'instagram',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'youtube',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'title' => 'modal',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'slides',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => 'acreditacion',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
