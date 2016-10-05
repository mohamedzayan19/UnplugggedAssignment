<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\SocialAccountService;
use Socialite;
use Search;
class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        Search::insert('user'.$user->id, array(
        'title' => $user->name,
        ));
        auth()->login($user);

        return redirect(action('HomeController@index'));
    }}
