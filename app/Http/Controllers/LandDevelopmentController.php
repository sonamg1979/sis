<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\LandDevelopment;
use DB;

class LandDevelopmentController extends Controller
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
        $group = DB::table('land_developments')
        ->where('subsector', '=', session('SUBSEC'))
        ->get();
        return view('agriculture.landdevelopment.index')->with('development',$group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agriculture.landdevelopment.create');
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
            'location' =>'required',
            'wet' =>'required',
            'dry' =>'required',
            
        ]);

        $info = new LandDevelopment;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->wet = $request->input('wet');
        $info->dry = $request->input('dry');
        $info->location = $request->input('location');
        $info->remarks = $request->input('remarks');
        $info->save();
        return redirect('/landdevelopment')->with('success','Saved successfully!!');
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
        $info=LandDevelopment::find($id);
        return view('agriculture.landdevelopment.edit')->with('development',$info);
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
            'location' =>'required',
            'wet' =>'required',
            'dry' =>'required',
        ]);
        
        $info = LandDevelopment::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->wet = $request->input('wet');
        $info->dry = $request->input('dry');
        $info->location = $request->input('location');
        $info->remarks = $request->input('remarks');
        $info->save();
        return redirect('/landdevelopment')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= LandDevelopment::find($id);
        $info->delete();
        return redirect('/landdevelopment')->with('success','Deleted successfully!!');
    }
}
