<?php

use App\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();

        for ($i=0; $i<10; $i++) {

            $category = Category::create([
                'title' => $this->faker->words(random_int(2,6), true),
            ]);

            echo ' - ' . $i . ': ' . $category->title . "\n";
        }

    }
}
