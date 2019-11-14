<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\SchoolStaffInfo;
use DB;

class SchoolStaffInfoController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$staffs = SchoolStaffInfo::paginate(10);
        $staffs = DB::table('schoolstaffinfos')
            ->where('subsector', '=', session('SUBSEC'))
            ->paginate(10);
        ;
        return view('school.staff.index')->with('staffs',$staffs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.staff.create');
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
            'year' =>'required|numeric',
            'tmale' =>'required|numeric',
            'tfemale' =>'required|numeric',
            'cmale' =>'required|numeric',
            'cfemale' =>'required|numeric',
            'smale' =>'required|numeric',
            'sfemale' =>'required|numeric'
        ]);

        $schoolinfo = new SchoolStaffInfo;
        $schoolinfo->subsector = session('SUBSEC');
        $schoolinfo->year = $request->input('year');
        $schoolinfo->tmale = $request->input('tmale');
        $schoolinfo->tfemale = $request->input('tfemale');
        $schoolinfo->cmale = $request->input('cmale');
        $schoolinfo->cfemale = $request->input('cfemale');
        $schoolinfo->smale = $request->input('smale');
        $schoolinfo->sfemale = $request->input('sfemale');
        $schoolinfo->save();
        return redirect('/staff')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schoolinfo=SchoolStaffInfo::find($id);
        return view('school.staff.edit')->with('schoolinfos',$schoolinfo);
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
            'year' =>'required|numeric',
            'tmale' =>'required|numeric',
            'tfemale' =>'required|numeric',
            'cmale' =>'required|numeric',
            'cfemale' =>'required|numeric',
            'smale' =>'required|numeric',
            'sfemale' =>'required|numeric'
        ]);
        
        $schoolinfo = SchoolStaffInfo::find($id);
        $schoolinfo->year = $request->input('year');
        $schoolinfo->tmale = $request->input('tmale');
        $schoolinfo->tfemale = $request->input('tfemale');
        $schoolinfo->cmale = $request->input('cmale');
        $schoolinfo->cfemale = $request->input('cfemale');
        $schoolinfo->smale = $request->input('smale');
        $schoolinfo->sfemale = $request->input('sfemale');
        $schoolinfo->save();
        return redirect('/staff')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolinfo= SchoolStaffInfo::find($id);
        $schoolinfo->delete();
        return redirect('/staff')->with('success','Deleted successfully!!');
    }
}
