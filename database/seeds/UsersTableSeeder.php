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
        factory(App\User::class, 1)->create([
            'name' => 'Carol Mirabal',
            'email' => 'carolmirabal27@gmail.com',
            'password' => bcrypt('123'),
            'active' => true

        ])->each(function (App\User $post) {
            $post->roles()->attach([
                1,
                2
            ]);
            });
      
    }
}
