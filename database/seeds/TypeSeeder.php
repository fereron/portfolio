<?php

use App\Type;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
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
        Type::truncate();

        for ($i=0; $i<100; $i++) {
            Type::create([
                'name' =>   $this->faker->word
            ]);
        }

    }
}
