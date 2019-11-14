<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\SchoolInfra;
use DB;

class SchoolInfraController extends Controller
{
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
        //$infras = SchoolInfra::paginate(10);
        $infras = DB::table('school_infras')
            ->join('school_level','school_infras.schoollevel', '=', 'school_level.id')
            ->where('subsector', '=', session('SUBSEC'))
            ->select('school_infras.id','school_infras.schoolname','school_infras.location',
                'school_infras.area','school_infras.estdyear','school_infras.classroom','school_infras.hall',
                'school_infras.football','school_infras.volleyball','school_infras.basketball','school_infras.indoor',
                'school_level.schoollevel')
            ->get();
        ;
        return view('school.infra.index')->with('infras',$infras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = DB::table('school_level')
            ->get();
        return view('school.infra.create')->with('levels',$level);
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
            'schoolname' =>'required|min:5',
            'location' =>'required',
            'indoor'=>'required',
            'area' =>'required|numeric',
            'hall' =>'required|numeric',
            'classroom'=>'required|numeric'
        ]);

        $schoolinfo = new SchoolInfra;
        $schoolinfo->subsector = session('SUBSEC');
        $schoolinfo->estdyear = $request->input('year');
        $schoolinfo->schoolname = $request->input('schoolname');
        $schoolinfo->location = $request->input('location');
        $schoolinfo->area = $request->input('area');
        $schoolinfo->schoollevel = $request->input('level');
        $schoolinfo->classroom = $request->input('classroom');
        $schoolinfo->hall = $request->input('hall');
        $schoolinfo->football = $request->input('football');
        $schoolinfo->volleyball = $request->input('volleyball');
        $schoolinfo->basketball = $request->input('basketball');
        $schoolinfo->indoor = $request->input('indoor');
        $schoolinfo->save();
        return redirect('/school')->with('success','Saved successfully!!');
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
        $schoolinfo=SchoolInfra::find($id);
        $levels=DB::table('school_level')
            ->get();
        return view('school.infra.edit')->with('schoolinfos',$schoolinfo)
        ->with('levels',$levels);
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
            'schoolname' =>'required',
            'location' =>'required'
        ]);
        
        $schoolinfo = SchoolInfra::find($id);
        $schoolinfo->subsector = session('SUBSEC');
        $schoolinfo->estdyear = $request->input('year');
        $schoolinfo->schoolname = $request->input('schoolname');
        $schoolinfo->location = $request->input('location');
        $schoolinfo->area = $request->input('area');
        $schoolinfo->schoollevel = $request->input('level');
        $schoolinfo->classroom = $request->input('classroom');
        $schoolinfo->hall = $request->input('hall');
        $schoolinfo->football = $request->input('football');
        $schoolinfo->volleyball = $request->input('volleyball');
        $schoolinfo->basketball = $request->input('basketball');
        $schoolinfo->indoor = $request->input('indoor');
        $schoolinfo->save();
        return redirect('/school')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schoolinfo= SchoolInfra::find($id);
        $schoolinfo->delete();
        return redirect('/school')->with('success','Deleted successfully!!');
    }
}