<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Studentage;
use App\Classx;
use DB;

class MasterStudentageController extends Controller
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
        $info = DB::table('student_ages')
        ->join('class', 'student_ages.class', '=', 'class.id')
        ->select('student_ages.id', 'student_ages.age', 'class.class')
        ->paginate(10);
        return view('master.studentage.index')->with('sectors',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = DB::table('class')
        ->get();
        return view('master.studentage.create')
            ->with('sectors',$info);
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
            'class' =>'required',
            'age' =>'required'
        ]);

        $info = new Studentage;
        $info->class = $request->input('class');
        $info->age = $request->input('age');
        $info->save();
        return redirect('/studentage')->with('success','Saved successfully!!');
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
        $info=Studentage::find($id);
        $sector = DB::table('class')
        ->get();
        return view('master.studentage.edit')->with('datas',$info)
            ->with('sector',$sector);
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
            'class' =>'required',
            'age' =>'required'
        ]);
        
        $info = Studentage::find($id);
        $info->class = $request->input('class');
        $info->age = $request->input('age');
        $info->save();
        return redirect('/studentage')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Studentage::find($id);
        $info->delete();
        return redirect('/studentage')->with('success','Deleted successfully!!');
    }
}
