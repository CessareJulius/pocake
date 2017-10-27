<?php
use Migrations\AbstractMigration;

class CreateBookmarksSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity("Bookmarks", 200, [
            "title" => function () use ($faker) {
                return $faker->Sentence($nbWords = 3, $variablenbWords = true);
            },
            "descripcion" => function () use ($faker) {
                return $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            },
            "url" => function () use ($faker) {
                return $faker->url;
            },
            "created" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "modified" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "user_id" => function () {
                return rand(1, 51);
            }
        ]);
        $populator->execute();
    }
}
