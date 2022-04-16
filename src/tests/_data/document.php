<?php

use Faker\Factory;

$data = [];
$faker = Factory::create();

for($i = 0; $i < 30; $i++) {
    $data[] = [
        'title' => 'Partner: title - ' . $faker->words($nb = rand(1, 3), $asText = true),
        'file' => 'https://picsum.photos/id/' . ($i + 1) . '/525/525/',
        'size' => rand(23,568) . 'КиБ',
        'accepted_at' => '1596539222',
        'number' => '№ AT-5392/01-02-2019',
        'category_id' => rand(1,9),
        'is_publish' => round(rand(2, 10) / 10, 0),
        'status' => 10,
        'created_at' => '1596539222',
        'updated_at' => '1596539222',
    ];
}

return $data;