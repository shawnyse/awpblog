<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder {

    public function run () {

        factory (Comment::class, 60) -> create ();

    }
}

