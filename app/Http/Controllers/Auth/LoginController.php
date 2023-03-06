<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
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
        $this->middleware('guest:masyarakat')->except('logout');
    }

    public function error()
    {
        return abort(403);
    }
    

    public function showMasyarakatLogin()
    {
        return view('auth.login', ['url' => 'masyarakat']);
    }

    public function MasyarakatLogin(Request $request)
    {
        // $masyarakat = Masyarakat::all();
        // $data = $request->all();

        $cred = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if(Auth::guard('masyarakat')->attempt($cred)) {
            // dd($cred);
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
