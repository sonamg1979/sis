<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Subsector;
use App\Sector;
use DB;

class MasterSubsectorController extends Controller
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
        $info = DB::table('subsector')
        ->join('sector', 'subsector.sector_id', '=', 'sector.id')
        ->select('subsector.id', 'subsector.subsector', 'sector.sector')
        ->paginate(10);
        return view('master.subsector.index')->with('sectors',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = DB::table('sector')
        ->get();
        return view('master.subsector.create')
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
            'sector' =>'required',
            'subsector' =>'required'
        ]);

        $info = new Subsector;
        $info->sector_id = $request->input('sector');
        $info->subsector = $request->input('subsector');
        $info->save();
        return redirect('/subsector')->with('success','Saved successfully!!');
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
        $info=Subsector::find($id);
        $sector = DB::table('sector')
        ->get();
        return view('master.subsector.edit')->with('datas',$info)
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
            'sector' =>'required',
            'subsector' =>'required'
        ]);
        
        $info = Subsector::find($id);
        $info->sector_id = $request->input('sector');
        $info->subsector = $request->input('subsector');
        $info->save();
        return redirect('/subsector')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Subsector::find($id);
        $info->delete();
        return redirect('/subsector')->with('success','Deleted successfully!!');
    }
}
