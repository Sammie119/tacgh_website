<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserTracker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            $user = auth()->user();

            $other_detail = $_SERVER['HTTP_USER_AGENT'];
            $ip = $request->ip();

            $login_details = "{'User name' => $user->name,
                'IP' => $ip,
                'Other detail' => $other_detail}";

            // dd($login_details);

            $user_tracker = UserTracker::where('user_id', $user->id)->where('logout_at', NULL)->first();

            if ($user_tracker) {
                $user_tracker->update(['logout_at' => now()]);
            };

            UserTracker::create([
                'user_id' => $user->id,
                'details' => $login_details,
                'login_at' => now(),
            ]);

            User::find($user->id)->update(['is_logged_in' => 1]);

            return redirect()->route('dashboard')->with('success', 'Login Successful');
            // return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $user_tracker = UserTracker::where('user_id', Auth::user()->id)
            ->where('logout_at', NULL)
            ->first();
        if ($user_tracker) {
            $user_tracker->update(['logout_at' => now()]);
        }

        User::find(Auth::user()->id)->update(['is_logged_in' => 0]);

        // auth()->logout();
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}
