<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;

/*
That's really a good function
*/
class LikesController extends Controller {

    public function upVote (Comment $comment) {

        $comment -> upvoteAndSave ();

        return redirect () -> action ('CommentController@index');

    }

    public function downVote (Comment $comment) {

        $comment -> downvoteAndSave ();

        return redirect () -> action ('CommentController@index');

    }

}
