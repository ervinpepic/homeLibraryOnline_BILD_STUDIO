<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        'title' => Str::random(5),
        'author_name' => Str::random(5),
        'category' => Str::random(5),
        'publisher' => Str::random(14),
        'status' => 'Available'
    ];
});
