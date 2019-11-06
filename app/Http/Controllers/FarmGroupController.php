<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\FarmGroup;
use DB;

class FarmGroupController extends Controller
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
        //$group = FarmGroup::paginate(10);
        $group = DB::table('farm_groups')
        ->where('subsector', '=', session('SUBSEC'))
        ->paginate(10);
        return view('agriculture.farmgroup.index')->with('groups',$group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agriculture.farmgroup.create');
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
            'title' =>'required',
            'number' =>'required',
            'registration_number' =>'required'
        ]);

        $info = new FarmGroup;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->group_name = $request->input('title');
        $info->number = $request->input('number');
        $info->registration_number = $request->input('registration_number');
        $info->save();
        return redirect('/farmgroup')->with('success','Saved successfully!!');
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
        $info=FarmGroup::find($id);
        return view('agriculture.farmgroup.edit')->with('groups',$info);
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
            'title' =>'required',
            'number' =>'required',
            'registration_number' =>'required'
        ]);
        
        $info = FarmGroup::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->group_name = $request->input('title');
        $info->number = $request->input('number');
        $info->registration_number = $request->input('registration_number');
        $info->save();
        return redirect('/farmgroup')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= FarmGroup::find($id);
        $info->delete();
        return redirect('/farmgroup')->with('success','Deleted successfully!!');
    }
}
