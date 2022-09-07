<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    //TO DO : The function below should redirect the authorized user to go to dashboard and admin to admin dashboard. It can be done differently. 
    // protected function redirectTo()
    // {
    //     $user = User::get()->firstOrFail();
    //     Log::debug($user);
    //     if ($user->id === 1) {
    //         $redirectTo = "/admin-dashboard";
    //         return $redirectTo;
    //     } else {
    //         $redirectTo = "/user-dashboard";
    //         return $redirectTo;
    //     }
    // }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        session()->flash('message', "Hi {$user->name}, You have been successfully logged in!");
    }
}
