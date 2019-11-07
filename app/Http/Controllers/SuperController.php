<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:super');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('superdashboard');
    }
    public function logout(Request $request) {
        Auth::guard('super')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'super.dashboard' ));
    }

    
}
