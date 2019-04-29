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
                    'id' => 1,
                    'title' => 'Titulo Página',
                    'slug' => 'title',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 2,
                    'title' => 'Descripción de la Página',
                    'slug' => 'description',
                    'content' => 'IOPA - Clínica Oftalmológica',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 3,
                    'title' => 'logo',
                    'slug' => 'logo',
                    'content' => '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 4,
                    'title' => 'Redes y Call Center',
                    'slug' => 'rrss',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
               
                [
                    'id' => 5,
                    'title' => 'Popup Principal',
                    'slug' => 'popup',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 6,
                    'title' => 'Slides del home',
                    'slug' => 'slides',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 7,
                    'title' => 'Descripcion de páginas',
                    'slug' => 'pages-description',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 8,
                    'title' => 'Logos de acreditacion',
                    'slug' => 'logos-acred',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 9,
                    'title' => 'Sobre Nosotros',
                    'slug' => 'aboutus',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 10,
                    'title' => 'Descripcion de una consulta general',
                    'slug' => 'query',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 11,
                    'title' => 'Contacto',
                    'slug' => 'contact',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 12,
                    'title' => 'Configuracion Footer',
                    'slug' => 'home',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 13,
                    'title' => 'Specialties Home',
                    'slug' => 'specialty',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id' => 14,
                    'title' => 'Convenios Home',
                    'slug' => 'convenio',
                    'content' => '[]',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);
        }
    }
}
