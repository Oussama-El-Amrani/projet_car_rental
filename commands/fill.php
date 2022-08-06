<?php
require dirname(__DIR__) . '/vendor/autoload.php';

// $faker = Faker\Factory::create('fr_FR');
$faker = Faker\Factory::create();

// generate data by accessing properties
echo $faker->date($format = 'Y-m-d', $max = 'now');
for ($i = 0; $i < 10; $i++) {
    echo $faker->name, "\n";
  }
// echo $faker->paragraphs($nb = 3, $asText = false);
$pdo = new PDO('mysql:dbname=tutoblog;host=localhost', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

for($i = 0 ; $i<50 ; $i++){
    $pdo->exec("INSERT INTO post SET name='Article #$i', slug='article-$i', created_ad='{$faker->date($format = 'Y-m-d', $max = 'now')}', content='lorem ipsum'");
}
for($i = 0 ; $i<50 ; $i++){
    // $pdo->exec("INSERT INTO category SET name='{$faker->sentence(3)}', slug='{$faker->slug}'");
}