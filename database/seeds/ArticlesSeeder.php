<?php

use App\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create('ru_RU');
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('articles')->truncate();

        for ($i = 0; $i<100; $i++) {
            Article::create([
                'title' => $this->faker->sentence(random_int(2, 6), true),
                'text' => $this->faker->paragraphs(random_int(10, 40), true),
                'status' => $this->faker->randomElement(['Draft', 'Review', 'Published']),
                'user_id' => 1,
                'cat_id' => random_int(1,10)
            ]);

        }



    }
}
