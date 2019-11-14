<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Admin;
use App\Subsector;
use DateTime;
use Hash;
use DB;

class SuperUserController extends Controller
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
    //sub-sector auto dropdown
    public function sub_sector(){
        $subsector_id = Input::get('sector_id');
        $subsector = Subsector::where('sector_id', '=', $subsector_id)->get();
        return response()->json($subsector);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///$activity = Activity::paginate(10);
        $user = DB::table('admins')
            ->join('subsector', 'admins.subsector', '=', 'subsector.id')
            ->select('admins.id','admins.name','admins.email','subsector.subsector')
            ->paginate(10);
        return view('administrator.users.index')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector=DB::table('sector')
                ->get();
        return view('administrator.users.create')->with('sector',$sector);
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
            'sector' =>'required',
            'subsector' =>'required',
            'email' =>'required|email',
            'name' =>'required',
            'password' =>'required'
        ]);
        
        $activity = new Admin;
        $activity->sector = $request->input('sector');
        $activity->subsector = $request->input('subsector');
        $activity->email = $request->input('email');
        $activity->name = $request->input('name');
        $activity->employee_id = $request->input('employeeid');
        $activity->password = Hash::make($request->input('password'));
        $activity->save();

        return redirect('/users')->with('success','Saved successfully!!');
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
        $sector=DB::table('sector')
            ->get();
        $subsector=DB::table('subsector')
            ->get();
        $info=Admin::find($id);
        return view('administrator.users.edit')->with('sector',$sector)->with('subsector',$subsector)
        ->with('datas',$info);
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
            'sector' =>'required',
            'subsector' =>'required',
            'email' =>'required|email',
            'name' =>'required'
        ]);
        
        $activity = Admin::find($id);
        $activity->sector = $request->input('sector');
        $activity->subsector = $request->input('subsector');
        $activity->email = $request->input('email');
        $activity->name = $request->input('name');
        $activity->employee_id = $request->input('employeeid');
        $activity->save();
        return redirect('/users')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity= Admin::find($id);
        $activity->delete();
        return redirect('/users')->with('success','Deleted successfully!!');
    }
}
