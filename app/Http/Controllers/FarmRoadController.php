<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\FarmRoad;
use DB;

class FarmRoadController extends Controller
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
        $info = DB::table('farm_roads')
            ->join('construct_types', 'farm_roads.construct_type', '=', 'construct_types.id')
            ->join('construct_modes', 'farm_roads.construct_mode', '=', 'construct_modes.id')
            ->where('subsector', '=', session('SUBSEC'))
            ->select('farm_roads.id', 'farm_roads.road_name', 'farm_roads.chiwog', 'farm_roads.length', 
            'farm_roads.benefeciaries', 'farm_roads.year',
            'farm_roads.group', 'farm_roads.male', 'farm_roads.female',
            'farm_roads.status', 'construct_modes.construct_mode', 'construct_types.construct_type')
            ->paginate(10);
        
        return view('agriculture.farmroad.index')->with('datas',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modes = DB::table('construct_modes')
            ->get();
        $types = DB::table('construct_types')
            ->get();
        return view('agriculture.farmroad.create')
        ->with('modes',$modes)
        ->with('types',$types);
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
            'road_name' =>'required',
            'chiwog' =>'required',
            'length' =>'required',
            'beneficiaries' =>'required',
            'mode' =>'required',
            'type' =>'required',
            'group' =>'required',
            'status' =>'required',
        ]);

        $info = new FarmRoad;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->road_name = $request->input('road_name');
        $info->chiwog = $request->input('chiwog');
        $info->length = $request->input('length');
        $info->benefeciaries = $request->input('beneficiaries');
        $info->construct_mode = $request->input('mode');
        $info->construct_type = $request->input('type');
        $info->group = $request->input('group');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->status = $request->input('status');
        $info->remarks = $request->input('remarks');
        $info->save();
        return redirect('/farmroad')->with('success','Saved successfully!!');
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
        $modes = DB::table('construct_modes')
            ->get();
        $types = DB::table('construct_types')
            ->get();
        $info=FarmRoad::find($id);
        return view('agriculture.farmroad.edit')->with('infos',$info)
        ->with('modes',$modes)
        ->with('types',$types);
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
            'road_name' =>'required',
            'chiwog' =>'required',
            'length' =>'required',
            'beneficiaries' =>'required',
            'mode' =>'required',
            'type' =>'required',
            'group' =>'required',
            'status' =>'required',
        ]);
        
        $info = FarmRoad::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->road_name = $request->input('road_name');
        $info->chiwog = $request->input('chiwog');
        $info->length = $request->input('length');
        $info->benefeciaries = $request->input('beneficiaries');
        $info->construct_mode = $request->input('mode');
        $info->construct_type = $request->input('type');
        $info->group = $request->input('group');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->status = $request->input('status');
        $info->remarks = $request->input('remarks');
        $info->save();
        return redirect('/farmroad')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= FarmRoad::find($id);
        $info->delete();
        return redirect('/farmroad')->with('success','Deleted successfully!!');
    }
}
