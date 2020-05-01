<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function update(Request $request, Comment $comment){
        $userData = $request->all();
        $user = User::find(Auth::user()->id);
        $user->update(Arr::only($userData,['name','email']));
        $detail = User::where('id', Auth::user()->id)->with("comment")->get();
        return view('auth.userDetail', compact('comment', 'detail'));
    }

    public function changeDetail() {
        return view('auth.changeDetail');
    }
}
