<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        User::create([
            'name'     => 'Admin11',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
//        $this->call(TypeSeeder::class);
//        $this->call(SparesSeeder::class);


    }
}
