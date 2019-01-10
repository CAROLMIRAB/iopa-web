<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(OfficesTableSeeder::class);
        $this->call(DoctorsTableSeeder::class);
        $this->call(SurgeriesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        
    }
}
