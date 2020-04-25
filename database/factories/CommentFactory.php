<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

use App\User;

$factory->define(Comment::class, function (Faker $faker) {

    $users = User::all ();

    return [
        'user_id' => $users -> random (),
        'comment' => $faker -> sentence (12, true) . ' ' . $faker -> emoji,
        'likes' => $faker -> numberBetween (-20, 150),
        'score' => $faker -> numberBetween (0,10),
        'movie' => $faker -> city, //I can' find random movie names so use City instead, just a test.
    ];
});
