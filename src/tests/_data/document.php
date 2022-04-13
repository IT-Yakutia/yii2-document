<?php

use Faker\Factory;

$data = [];
$faker = Factory::create();

for($i = 0; $i < 30; $i++) {
    $data[] = [
        'title' => 'Partner: title - ' . $faker->words($nb = rand(1, 3), $asText = true),
        'photo' => 'https://picsum.photos/id/' . ($i + 1) . '/525/525/',
        'link' => $faker->url,
        'is_publish' => round(rand(2, 10) / 10, 0),
        'status' => 10,
        'created_at' => '1596539222',
        'updated_at' => '1596539222',
    ];
}

return $data;