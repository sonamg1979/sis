<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\LivestockGroup;
use DB;

class LivestockGroupController extends Controller
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
        $groups = DB::table('livestock_groups')
        ->where('subsector', '=', session('SUBSEC'))
        ->paginate(10);
        return view('livestock.livestockgroup.index')->with('groups',$groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livestock.livestockgroup.create');
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
            'title' =>'required|min:4',
            'male' =>'required',
            'female' =>'required',
            'registration_number' =>'required'
        ]);

        $info = new livestockgroup;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->group_name = $request->input('title');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->registration_number = $request->input('registration_number');
        $info->save();
        return redirect('/livestockgroup')->with('success','Saved successfully!!');
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
        $info = DB::table('livestock_groups')
        ->where('subsector', '=', session('SUBSEC'))
        ->get();
        return view('livestock.livestockgroup.edit')->with('groups',$info);
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
            'title' =>'required|min:4',
            'male' =>'required',
            'female' =>'required',
            'registration_number' =>'required'
        ]);
        
        $info = LivestockGroup::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->group_name = $request->input('title');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->registration_number = $request->input('registration_number');
        $info->save();
        return redirect('/livestockgroup')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= LivestockGroup::find($id);
        $info->delete();
        return redirect('/livestockgroup')->with('success','Deleted successfully!!');
    }
}
