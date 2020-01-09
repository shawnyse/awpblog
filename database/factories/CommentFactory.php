<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker -> firstName . ' ' . $faker -> lastName,
        'comment' => $faker -> sentence (12, true) . ' ' . $faker -> emoji,
        'likes' => $faker -> numberBetween (-20, 150),
        'score' => $faker -> numberBetween (0,10),
        'movie' => $faker -> word(), //I can' find random movie names so use Word instead, just a test.
    ];
});
