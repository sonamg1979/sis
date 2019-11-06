<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\LivestockInfra;
use DB;

class LivestockInfraController extends Controller
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
        $group = DB::table('livestock_infras')
        ->where('subsector', '=', session('SUBSEC'))
        ->get();
        return view('livestock.infra.index')->with('faclility',$group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livestock.infra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $info = new LivestockInfra;
        $info->subsector = session('SUBSEC');
        $info->ais = $request->input('ais');
        $info->biogas = $request->input('biogas');
        $info->poultry_micro = $request->input('poultry_micro');
        $info->poultry_commercial = $request->input('poultry_commercial');
        $info->poultry_broiler = $request->input('poultry_broiler');
        $info->diary_micro = $request->input('diary_micro');
        $info->diary_commercial = $request->input('diary_commercial');
        $info->milk_processing = $request->input('milk_processing');

        $info->save();
        return redirect('/livestockinfra')->with('success','Saved successfully!!');
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
        $info=LivestockInfra::find($id);
        return view('livestock.infra.edit')->with('groups',$info);
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
        
        $info = LivestockInfra::find($id);
        $info->subsector = session('SUBSEC');
        $info->ais = $request->input('ais');
        $info->biogas = $request->input('biogas');
        $info->poultry_micro = $request->input('poultry_micro');
        $info->poultry_commercial = $request->input('poultry_commercial');
        $info->poultry_broiler = $request->input('poultry_broiler');
        $info->diary_micro = $request->input('diary_micro');
        $info->diary_commercial = $request->input('diary_commercial');
        $info->milk_processing = $request->input('milk_processing');
        $info->save();
        return redirect('/livestockinfra')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= LivestockInfra::find($id);
        $info->delete();
        return redirect('/livestockinfra')->with('success','Deleted successfully!!');
    }
}
