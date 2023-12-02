<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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


    public function login(Request $request)
    {
        $request->validate(
            [
                'login_id' => 'required|string',
                'password' => 'required|string',
            ],
            ['login_id' => 'Contact No Or Email Id field is required.']
        );

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $credentials = [];
        if (!preg_match('#[^0-9]#', $request->login_id)) {
            $credentials = [
                'mobile_no' => $request->login_id,
                'password' => $request->password
            ];
        } else {
            $credentials = [
                'email' => $request->login_id,
                'password' => $request->password
            ];
        }

        if (
            User::where('mobile_no', $request->login_id)->orwhere('email', $request->login_id)->whereIn('role', [1, 2])->get()->first() &&
            $this->guard()->attempt(
                $credentials,
                $request->boolean('remember')
            )
        ) {

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.


        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        if (auth()->guard('web')) {
            auth()->logout();
            return redirect('/admin/login');
        }
    }
}
