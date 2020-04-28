<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Mail\CommentUpdated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /*only if login, can see this page*/
    public function __construct()
    {
        $this->middleware('auth');
    }


    const COMMENTS_PER_PAGE = 10;

    const RULES = [
        'comment' => 'required|min:2|max:256',
        'score' => 'required|min:0|max:10',
        'movie' => 'required|min:1|max:64',
    ];

    const MESSAGES = [
        'comment.required' => 'May I have your comment here?',
        'movie.required' => 'Please enter a movie name here.',
        'score.required' => 'Please rate this movie.',

    ];

    public function index()
    {

        $comments = Comment::paginate(self::COMMENTS_PER_PAGE);
        return view('index')->with(['comments' => $comments]);

    }

    public function create()
    {

        return view('comments.create');

    }

    public function store(Request $request)
    {

        $request->validate(self::RULES, self::MESSAGES);

        Comment::create([

            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment'),
            'score' => $request->post('score'),
            'movie' => $request->input('movie'),
            'likes' => 0,

        ]);

        return redirect()->action('CommentController@index');

    }

    public function show(Comment $comment)
    {

        return view('comments.show', compact('comment'));


    }

    public function edit(Comment $comment)
    {

        return view('comments.edit', compact('comment'));


    }

    public function update(Request $request, Comment $comment)
    {

        $request->validate(self::RULES, self::MESSAGES);

        if ($comment->comment != request('comment')) {

            $comment->update([

                'comment' => request('comment'),
                'score' => $request->score,
                'updating_user_id' => Auth::user()->id,

            ]);

            if (($comment->user->id != Auth::user()->id) && (!empty ($comment->getChanges()))) {
                Mail::to($comment->user->email)->send(new CommentUpdated ($comment));
            }

        }

        return redirect()->action('CommentController@index');

    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->action('CommentController@index');

    }

    /*userDetail function*/
    public function userDetail(Comment $comment)
    {
        $detail = User::where('id', Auth::user()->id)->with("comment")->get();

        return view('auth.userDetail', compact('comment', 'detail'));

    }

    /*logout function*/
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();
        // 自定义重定向地址
        return redirect('/');
    }

    /*search function*/
    public function result(Request $request)
    {

        $keyword = $request->input('keyword');
        $type = $request->input('type');

        $paramMap = [
            'Movie' => 'movie',
            'Comment' => 'comment',
            'Score' => 'score',
            'default' => 'likes',
        ];

        if ($type == 'User') {
            $result = User::where('name', 'like', '%' . $keyword . '%')->with("comment")->get();
        } else {
            $result = Comment::where(
                $paramMap[$type] ?? $paramMap['default'],
                'like',
                "%" . $keyword . "%"
            )
                ->with("user")
                ->get();
        }
        return view('comments.search', compact('keyword', 'result', 'type'));
    }

}


