<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller {

    const COMMENTS_PER_PAGE = 10;

    const RULES = [
        'name' => 'required|min:3|max:64',
        'comment' => 'required|min:2|max:256',
        'score' => 'required|min:0|max:10',
        'movie' => 'required|min:1|max:64',
    ];

    const MESSAGES = [
        'name.required' => 'Excuse me, May I Know your name?',
        'comment.required' => 'May I have your comment here?',
        'movie.required' => 'Please enter a movie name here.',
        'score.required' => 'Please rate this movie.',
    ];

    public function index () {

        $comments = Comment::paginate (self::COMMENTS_PER_PAGE);

        return view ('index') -> with (['comments' => $comments]);

    }

    public function create () {

        return view ('comments.create');

    }

    public function store (Request $request) {

        $request -> validate (self::RULES, self::MESSAGES);

        Comment::create ([

            'name' => $request -> input ('name'),
            'comment' => $request -> input ('comment'),
            'score' => $request -> input ('score'),
            'movie' => $request -> input ('movie'),
            'likes' => 0,

        ]);

        return redirect () -> action ('CommentController@index');

    }

    public function show (Comment $comment) {

        return view ('comments.show', compact ('comment'));

    }

    public function edit (Comment $comment) {

        return view ('comments.edit', compact ('comment'));

    }

    public function update (Request $request, Comment $comment) {

        $request -> validate (self::RULES, self::MESSAGES);

        $comment -> update ([
            'comment' => $request -> comment,
        ]);

        return redirect () -> action ('CommentController@index');

    }

    public function destroy (Comment $comment) {

        $comment -> delete ();

        return redirect () -> action ('CommentController@index');

    }

}
