<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\ElectricFencing;
use DB;

class ElectricFencingController extends Controller
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
        $info = DB::table('electric_fencings')
            ->join('status', 'electric_fencings.status', '=', 'status.id')
            ->join('fencing_type', 'electric_fencings.type', '=', 'fencing_type.id')
            ->where('electric_fencings.subsector', '=', session('SUBSEC'))
            ->select('electric_fencings.id', 'electric_fencings.location', 'electric_fencings.year', 
            'electric_fencings.beneficiaries', 'electric_fencings.wet', 'electric_fencings.dry',
            'electric_fencings.length', 'electric_fencings.remarks', 'status.status', 'fencing_type.type')
            ->paginate(10);
        return view('agriculture.fencing.index')->with('fencing',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status=DB::table('status')
            ->get();
        $type=DB::table('fencing_type')
            ->get();
        return view('agriculture.fencing.create')
            ->with('types',$type)
            ->with('status',$status);
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
            'length' =>'required',
            'beneficiaries' =>'required',
            'wet' =>'required',
            'dry' =>'required',
            'type' =>'required',
            'status' =>'required'
        ]);

        $info = new ElectricFencing;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->location = $request->input('location');
        $info->length = $request->input('length');
        $info->beneficiaries = $request->input('beneficiaries');
        $info->dry = $request->input('dry');
        $info->wet = $request->input('wet');
        $info->status = $request->input('status');
        $info->type = $request->input('type');
        $info->remarks = $request->input('remarks');

        $info->save();
        return redirect('/electricfencing')->with('success','Saved successfully!!');
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
        $status=DB::table('status')
            ->get();
        $type=DB::table('fencing_type')
            ->get();
        $info=ElectricFencing::find($id);
        return view('agriculture.fencing.edit')->with('infos',$info)
            ->with('types',$type)
            ->with('status',$status);
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
            'length' =>'required',
            'beneficiaries' =>'required',
            'wet' =>'required',
            'dry' =>'required',
            'type' =>'required',
            'status' =>'required'
        ]);
        
        $info = ElectricFencing::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->location = $request->input('location');
        $info->length = $request->input('length');
        $info->beneficiaries = $request->input('beneficiaries');
        $info->dry = $request->input('dry');
        $info->wet = $request->input('wet');
        $info->status = $request->input('status');
        $info->type = $request->input('type');
        $info->remarks = $request->input('remarks');
        $info->save();
        return redirect('/electricfencing')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= ElectricFencing::find($id);
        $info->delete();
        return redirect('/electricfencing')->with('success','Deleted successfully!!');
    }
}
