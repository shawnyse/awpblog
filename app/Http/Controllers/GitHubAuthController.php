<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GitHubAuthController extends Controller
{

    public function auth()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $user = $this->findOrCreateUser(
            Socialite::driver('github')->user()
        );

        Auth::login($user);

        return redirect()->action('CommentController@index');
    }

    private function findOrCreateUser($gitHubUser)
    {
        return User::firstOrCreate(['github_id' => $gitHubUser->getId()], [
            'name' => $gitHubUser->getName(),
            'email' => $gitHubUser->getEmail(),
            'password' => bcrypt(Str::random(32)),
        ]);
    }

}
