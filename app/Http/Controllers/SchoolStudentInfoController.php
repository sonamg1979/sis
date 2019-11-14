<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\SchoolStudentInfo;
use DB;

class SchoolStudentInfoController extends Controller
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
    public function group(){
        $id = Input::get('group');
        $group=DB::table('student_ages')
            ->where('class', '=', $id)
            ->get();
        return response()->json($group);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('school_student_infos')
            ->join('class', 'school_student_infos.class', '=', 'class.id')
            ->join('student_ages', 'school_student_infos.agerange', '=', 'student_ages.id')
            ->where('school_student_infos.subsector', '=', session('SUBSEC'))
            ->orderBy('school_student_infos.year', 'desc')
            ->orderBy('school_student_infos.class')
            ->orderBy('school_student_infos.agerange')
            ->select('school_student_infos.id', 'school_student_infos.year', 'school_student_infos.male', 
            'school_student_infos.female', 'class.class', 'student_ages.age')
            ->paginate(16);
        return view('school.student.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class=DB::table('class')
            ->get();
        return view('school.student.create')->with('class',$class);
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
            'year' =>'required',
            'class' =>'required',
            'group' =>'required',
            'male' =>'required|numeric',
            'female' =>'required|numeric'
        ]);

        $studentinfo = new SchoolStudentInfo;
        $studentinfo->subsector = session('SUBSEC');
        $studentinfo->year = $request->input('year');
        $studentinfo->class = $request->input('class');
        $studentinfo->agerange = $request->input('group');
        $studentinfo->male = $request->input('male');
        $studentinfo->female = $request->input('female');
        $studentinfo->save();
        return redirect('/student')->with('success','Saved successfully!!');
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
        $ages=DB::table('student_ages')
            ->get();
        $class=DB::table('class')
            ->get();
        $studentinfo=SchoolStudentInfo::find($id);
        return view('school.student.edit')->with('studentinfos',$studentinfo)->with('class',$class)->with('age',$ages);
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
            'year' =>'required',
            'class' =>'required',
            'group' =>'required',
            'male' =>'required|numeric',
            'female' =>'required|numeric'
        ]);
        
        $studentinfo = SchoolStudentInfo::find($id);
        $studentinfo->subsector = session('SUBSEC');
        $studentinfo->year = $request->input('year');
        $studentinfo->class = $request->input('class');
        $studentinfo->agerange = $request->input('group');
        $studentinfo->male = $request->input('male');
        $studentinfo->female = $request->input('female');
        $studentinfo->save();
        return redirect('/student')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentinfo= SchoolStudentInfo::find($id);
        $studentinfo->delete();
        return redirect('/student')->with('success','Deleted successfully!!');
    }
}
