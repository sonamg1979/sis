<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/admin';
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        //Validate forms
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Attempt to log in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember))
        {
            //Store Sector and subsector information in session
            $sector=DB::table('admins')
                ->where('email', '=', $request->email)
                ->get();
            foreach($sector as $row)
            {
                session([
                    'SEC' => $row->sector,
                    'SUBSEC' => $row->subsector,
                    'EMPID' => $row->employee_id
                ]);
            }
            //return redirect()->intended(route('admin.dashboard'));
            //return view('admindashboard');
        }
        //unsuccesful, redirect back to the login
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    // public function logout(Request $request) {
    //     Auth::guard('admin')->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect()->guest(route( 'admin.login' ));
    // }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }
}
