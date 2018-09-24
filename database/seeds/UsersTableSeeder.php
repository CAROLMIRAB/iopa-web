<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 29)->create();

        App\User::create([
            'name' => 'Carol Mirabal',
            'email' => 'carolmirabal27@gmail.com',
            'password' => bcrypt('123')
        ]);
    }
}
