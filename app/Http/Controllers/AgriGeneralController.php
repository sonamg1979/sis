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
            ->join('construct_types', 'agrigenerals.construct_type', '=', 'construct_types.id')
            ->join('construct_modes', 'agrigenerals.construct_mode', '=', 'construct_modes.id')
            ->join('chennel_types', 'agrigenerals.chennel_type', '=', 'chennel_types.id')
            ->where('subsector', '=', session('SUBSEC'))
            ->select('agrigenerals.id', 'agrigenerals.location', 'agrigenerals.length', 
            'agrigenerals.benefeciaries', 'agrigenerals.area', 'agrigenerals.year',
            'agrigenerals.associations', 'agrigenerals.male', 'agrigenerals.female',
            'agrigenerals.status', 'construct_modes.construct_mode', 'construct_types.construct_type','chennel_types.chennel_type')
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
        $modes = DB::table('construct_modes')
            ->get();
        $types = DB::table('construct_types')
            ->get();
        $ctypes = DB::table('chennel_types')
            ->get();
        return view('agriculture.general.create')
        ->with('modes',$modes)
        ->with('types',$types)
        ->with('ctypes',$ctypes);
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
            'location' =>'required|min:5',
            'length' =>'required|numeric',
            'hh' =>'required|numeric',
            'area' =>'required|numeric',
            'mode' =>'required',
            'type' =>'required',
            'ctype' =>'required',
            'association' =>'required',
            'status' =>'required',
        ]);

        $info = new Agrigeneral;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->location = $request->input('location');
        $info->length = $request->input('length');
        $info->benefeciaries = $request->input('hh');
        $info->area = $request->input('area');
        $info->construct_mode = $request->input('mode');
        $info->construct_type = $request->input('type');
        $info->chennel_type = $request->input('ctype');
        $info->associations = $request->input('association');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->status = $request->input('status');
        $info->remarks = $request->input('remarks');
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
        $modes = DB::table('construct_modes')
            ->get();
        $types = DB::table('construct_types')
            ->get();
        $ctypes = DB::table('chennel_types')
            ->get();
        $info=Agrigeneral::find($id);
        return view('agriculture.general.edit')->with('infos',$info)
        ->with('modes',$modes)
        ->with('types',$types)
        ->with('ctypes',$ctypes);
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
            'location' =>'required|min:5',
            'length' =>'required|numeric',
            'hh' =>'required|numeric',
            'area' =>'required|numeric',
            'mode' =>'required',
            'type' =>'required',
            'ctype' =>'required',
            'association' =>'required',
            'status' =>'required',
        ]);
        
        $info = Agrigeneral::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->location = $request->input('location');
        $info->length = $request->input('length');
        $info->benefeciaries = $request->input('hh');
        $info->area = $request->input('area');
        $info->construct_mode = $request->input('mode');
        $info->construct_type = $request->input('type');
        $info->chennel_type = $request->input('ctype');
        $info->associations = $request->input('associations');
        $info->male = $request->input('male');
        $info->female = $request->input('female');
        $info->status = $request->input('status');
        $info->remarks = $request->input('remarks');
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
