<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // Where to redirect users after login.
    protected $redirectTo = '/';

    // login page の表示
    public function login()
    {
        return view('auth.login');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // GitHubの認証ページヘユーザーをリダイレクト
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect(); 
    }

    // GitHubからユーザー情報を取得
    public function handleProviderCallback(Request $request)
    {
        try {
            $github_user = Socialite::with("github")->user();
        } catch (Exception $e) {
            return redirect('/login');
        }
        
        $app_user = User::firstOrCreate([
            'github_id' => $github_user->getId(),
            'name' => $github_user->getName(),
            'icon' => 'https://github.com/'.$github_user->getName().'.png'
        ]);

        auth()->login($app_user);

        return redirect('/');
    }
}