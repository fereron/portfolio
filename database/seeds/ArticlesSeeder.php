<?php

use App\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Symfony\Component\Finder\Finder;


class ArticlesSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    private $files;

    /**
     * ArticlesSeeder constructor.
     * @param Factory $faker
     */
    public function __construct(Factory $faker)
    {
        $this->files = iterator_to_array(
            (new Finder())
                ->in(base_path())
                ->name('*.php')
                ->files()
        );

        $this->faker = $faker::create('ru_RU');
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        for ($i = 0; $i<50; $i++) {
            $article = Article::create([
                'title' => $this->faker->sentence(random_int(2, 6), true),
//                'text' => $this->faker->paragraphs(random_int(10, 40), true),
                'text' => $this->createContent(),
                'status' => $this->faker->randomElement(['Draft', 'Review', 'Published']),
                'image' => random_int(1,5). '.png',
                'user_id' => 1,
                'cat_id' => random_int(1,10)
            ]);

            echo ' - ' . $i . ': ' . $article->title . "\n";
        }
    }

    private function createContent()
    {
        $paragraphsCount = random_int(2, 40);

        $result = [];

        for ($j = 0; $j < $paragraphsCount; ++$j) {
            if (random_int(0, 4) > 3) {
                $result[] = $this->createTitle();
            }

            if (random_int(0, 9) > 8) {
                $result[] = $this->createList();
            }

            if (random_int(0, 4) > 3) {
                $result[] = $this->createQuote();
            }

            if (random_int(0, 8) > 7) {
                $result[] = $this->createCode();
            }

            $result[] = $this->createParagraph();
        }

        return implode("\n", $result);
    }

    /**
     * @return string
     */
    private function createParagraph()
    {
        return $this->faker->sentences(random_int(2, 15), true);
    }

    /**
     * @return string
     */
    private function createTitle()
    {
        $level = random_int(3, 6);

        return "\n".
            str_repeat('#', $level).' '.
            $this->faker->words(random_int(1, 12), true)."\n";
    }

    /**
     * @return string
     */
    private function createList()
    {
        $listSize = random_int(2, 10);

        $result = [];
        for ($i = 0; $i < $listSize; $i++) {
            $result[] = (random_int(0, 5) && $i !== 0 > 4 ? '  ' : '').
                '- '.$this->faker->words(random_int(1, 12), true);
        }

        return implode("\n", $result)."\n";
    }

    /**
     * @return string
     */
    private function createQuote()
    {
        return '> '.$this->faker->sentences(random_int(1, 4), true)."\n";
    }

    private function createCode()
    {
        $file = $this->faker->randomElement($this->files);
        $sources = $file->getContents();

        return "\n".'```'."\n".
            $sources."\n".
            '```';
    }


}
