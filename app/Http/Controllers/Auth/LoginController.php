<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request $request )
    {

        $user = User::where( [ 'email' => $request->email ] )->first();

        if( !$user )
        {
            return response(
            [
                'error' => 'Wrong credentials'
            ],
            Response::HTTP_BAD_REQUEST
            );
        }

        if( password_verify( $request->password, $user->password ) )
        {
            return response([
                'token' => $user->api_token
            ], Response::HTTP_OK);
        }

        return response(
            [
                'error' => 'Wrong credentials'
            ],
            Response::HTTP_BAD_REQUEST
        );

    }
}
