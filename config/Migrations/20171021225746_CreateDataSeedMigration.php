<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateDataSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity("Users", 50, [
            "nombre" => function () use ($faker) {
                return $faker->firstName();
            },
            "apellido" => function () use ($faker) {
                return $faker->lastName();
            },
            "email" => function () use ($faker) {
                return $faker->safeEmail();
            },
            "clave" => function () {
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash("usuario");
            },
            "role" => "user",
            "active" => function () {
                return rand(0, 1);
            },
            "created" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            },
            "modified" => function () use ($faker){
                return $faker->dateTimeBetween($startDate = "now", $endDate = "now");
            }
        ]);
        $populator->execute();
    }
}
