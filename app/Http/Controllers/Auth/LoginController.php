<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Str;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user);
        $user=User::firstOrCreate([
            'email'=>$user->email
        ],
        [
        'name'=>$user->name,
        'password'=>bcrypt(Str::random(20))

        ]);

        Auth::login($user);

        return redirect('/');
    }
    
    
   
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        if($user->email!=null){
            $user=User::firstOrCreate([
            'email'=>$user->email
        ],
        [
        'name'=>$user->name,
        'password'=>bcrypt(Str::random(20))

        ]);
        Auth::login($user);
        }
        


        return redirect('/');
    }
}
