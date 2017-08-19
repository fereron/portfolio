<?php

use App\Spare;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SparesSeeder extends Seeder
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
        Spare::truncate();

        for ($i=0; $i<50; $i++) {
            $spare = Spare::create([
                'name' => $this->faker->words(2, true),
                'code' => $this->faker->randomNumber(5),
                'brand' => $this->faker->company,
            ]);

            for ($j=0; $j<random_int(1, 20); $j++) {
                DB::table('spare_type')->insert([
                    'spare_id' => $spare->id,
                    'type_id' => random_int(0,100)
                ]);
            }

            for ($k=0; $k<random_int(1, 4); $k++) {
                DB::table('spare_category')->insert([
                    'spare_id' => $spare->id,
                    'category_id' => random_int(0,10)
                ]);
            }

            echo ' - ' . $i . ': ' . $spare->name . "\n";
        }

    }

}
