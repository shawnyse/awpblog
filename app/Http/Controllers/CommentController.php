<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
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

            'name' => $request->input('name'),
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

        $comment->update([
            'comment' => $request->comment,
            'score' => $request->score,
        ]);

        return redirect()->action('CommentController@index');

    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return redirect()->action('CommentController@index');

    }

    /*logout function*/
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();
        // 自定义重定向地址
        return redirect('/');
    }

    /*Rearranged search function*/
    public function result(Request $request){

        $keyword = $request -> input('keyword');
        $type    = $request -> input('type');

        $paramMap = [
            'User'    => 'name',
            'Movie'   => 'movie',
            'Comment' => 'comment',
            'Score'   => 'score',
            'default' => 'likes',
        ];

        $result = DB::table('comments')
            ->where(
                $paramMap[$type] ?? $paramMap['default'],
                'like',
                "%".$keyword."%"
            )
            ->get();
        return view('comments.search',compact('keyword','result','type'));
    }

}

    /*old search function*/
//    public function result(Request $request)
//    {
//        $keyword = $request->input('keyword'); //get keywords from form named 'keyword'
//        $type = $request->input('type'); //get type from <selet> named type
//        /*Do some basic condition judgement*/
//        if($type == 'User'){
//            $result = DB::table('comments')->where('name','like',"%".$keyword."%")->get();
//        } elseif ($type == 'Comment') {
//            $result = DB::table('comments')->where('comment','like',"%".$keyword."%")->get();
//        } elseif($type == 'Score'){
//            $result = DB::table('comments')->where('score','like',"%".$keyword."%")->get();
//        } elseif ($type == 'Movie'){
//            $result = DB::table('comments')->where('movie' ,'like',"%".$keyword."%")->get();
//        } else{
//            $result = DB::table('comments')->where('likes','like',"%".$keyword."%")->get();
//        }
//        /*Return view and variable to front-end*/
//        return view('comments.search',compact('keyword','type','result'));
//    }


