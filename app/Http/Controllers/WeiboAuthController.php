<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class WeiboAuthController extends Controller
{

    public function auth()
    {
        return Socialite::driver('weibo')->redirect();
    }

    public function callback()
    {
        $user = $this->findOrCreateUser(
            Socialite::driver('weibo')->user()
        );

        Auth::login($user);

        return redirect()->action('CommentController@index');
    }

    private function findOrCreateUser($weiboUser)
    {
        return User::firstOrCreate(['weibo_id' => $weiboUser->getId()], [
            'name' => $weiboUser->getNickname(),
            'email' => $weiboUser->getAvatar(), /*getEmail needs authorization */
            'password' => bcrypt(Str::random(32)),
        ]);
    }

}
