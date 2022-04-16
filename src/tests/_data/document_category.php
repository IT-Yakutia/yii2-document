<?php

use Faker\Factory;

$data = [];
$faker = Factory::create();

for($i = 0; $i < 10; $i++) {
    $data[] = [
        'title' => 'НПА / ' . $faker->words($nb = rand(1, 3), $asText = true),
        'is_publish' => round(rand(2, 10) / 10, 0),
        'status' => 10,
        'created_at' => '1596539222',
        'updated_at' => '1596539222',
    ];
}

return $data;