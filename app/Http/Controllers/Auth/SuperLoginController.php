<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SuperLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:super',['except' => ['superlogout']]);
    }
    public function showLoginForm()
    {
        return view('auth.super-login');
    }
    public function login(Request $request)
    {
        //Validate forms
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt to log in
        if(Auth::guard('super')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember))
        {
            //return redirect()->intended(route('super.dashboard'));
            //return view('superdashboard');
        }
        //unsuccesful, redirect back to the login
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function superlogout(Request $request)
    {
        Auth::guard('super')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'super.login' ))
        ->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
    }
}
