<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Agrigeneral;
use DB;

class AgriGeneralController extends Controller
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
        $info = DB::table('agrigenerals')
            ->where('subsector', '=', session('SUBSEC'))
            ->paginate(10);
        return view('agriculture.general.index')->with('datas',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agriculture.general.create');
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
        ]);

        $info = new Agrigeneral;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->dry = $request->input('dry');
        $info->wet = $request->input('wet');
        $info->orchad = $request->input('orchad');
        $info->f_irrigation = $request->input('f_irrigation');
        $info->n_irrigation = $request->input('n_irrigation');
        $info->l_irrigation = $request->input('l_irrigation');
        $info->area_irrigation = $request->input('area_irrigation');
        $info->benefit_irrigation = $request->input('benefit_irrigation');
        $info->processing_unit = $request->input('processing_unit');
        $info->mills = $request->input('mills');
        $info->save();
        return redirect('/agrigeneral')->with('success','Saved successfully!!');
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
  
        $info=Agrigeneral::find($id);
        return view('agriculture.general.edit')->with('infos',$info);
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
        ]);
        
        $info = Agrigeneral::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->dry = $request->input('dry');
        $info->wet = $request->input('wet');
        $info->orchad = $request->input('orchad');
        $info->f_irrigation = $request->input('f_irrigation');
        $info->n_irrigation = $request->input('n_irrigation');
        $info->l_irrigation = $request->input('l_irrigation');
        $info->area_irrigation = $request->input('area_irrigation');
        $info->benefit_irrigation = $request->input('benefit_irrigation');
        $info->processing_unit = $request->input('processing_unit');
        $info->mills = $request->input('mills');
        $info->save();
        return redirect('/agrigeneral')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Agrigeneral::find($id);
        $info->delete();
        return redirect('/agrigeneral')->with('success','Deleted successfully!!');
    }
}
