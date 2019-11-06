<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Subsector;
use DateTime;
use Hash;
use DB;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///$activity = Activity::paginate(10);
        $user = DB::table('Users')
            ->paginate(10);
        return view('user.index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' =>'required|email',
            'name' =>'required'
        ]);
        
        $activity = new User;
        $activity->email = $request->input('email');
        $activity->name = $request->input('name');
        $activity->password = Hash::make($request->input('password'));
        $activity->save();

        return redirect('/nusers')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info=User::find($id);
        return view('user.edit')->with('datas',$info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'email' =>'required|email',
            'name' =>'required'
        ]);
        
        $activity = User::find($id);
        $activity->email = $request->input('email');
        $activity->name = $request->input('name');
        $activity->save();
        return redirect('/nusers')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity= User::find($id);
        $activity->delete();
        return redirect('/nusers')->with('success','Deleted successfully!!');
    }
}
