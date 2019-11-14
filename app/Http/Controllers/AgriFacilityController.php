<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\AgriFacility;
use DB;

class AgriFacilityController extends Controller
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
        //$group = AgriFacility::get();
        $group = DB::table('agri_facilities')
        ->where('subsector', '=', session('SUBSEC'))
        ->get();
        return view('agriculture.facility.index')->with('faclility',$group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agriculture.facility.create');
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
            'wet' =>'required|numeric',
            'c_wet' =>'required',
            'dry' =>'required',
            'c_dry' =>'required'
        ]);

        $info = new AgriFacility;
        $info->subsector = session('SUBSEC');
        $info->wet = $request->input('wet');
        $info->c_wet = $request->input('c_wet');
        $info->dry = $request->input('c_dry');
        $info->c_dry = $request->input('c_dry');
        $info->orchard = $request->input('orchard');
        $info->c_orchard = $request->input('c_orchard');

        $info->food_processing = $request->input('food_processing');
        $info->mills = $request->input('mills');
        $info->tradition_mills = $request->input('tradition_mills');
        $info->oil_expeller = $request->input('oil_expeller');
        $info->corn_flake = $request->input('corn_flake');
        $info->electric_dryer = $request->input('electric_dryer');
        $info->potatoe_fryer = $request->input('potatoe_fryer');
        $info->power_tiller = $request->input('power_tiller');
        $info->tractor = $request->input('tractor');
        $info->transplanter = $request->input('transplanter');
        $info->grass_cutter = $request->input('grass_cutter');
        $info->green_house = $request->input('green_house');

        $info->save();
        return redirect('/agrifacility')->with('success','Saved successfully!!');
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
        $info=AgriFacility::find($id);
        return view('agriculture.facility.edit')->with('groups',$info);
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
            'wet' =>'required',
            'c_wet' =>'required',
            'dry' =>'required',
            'c_dry' =>'required'
        ]);
        
        $info = AgriFacility::find($id);
        $info->subsector = session('SUBSEC');
        $info->wet = $request->input('wet');
        $info->c_wet = $request->input('c_wet');
        $info->dry = $request->input('c_dry');
        $info->c_dry = $request->input('c_dry');
        $info->orchard = $request->input('orchard');
        $info->c_orchard = $request->input('c_orchard');

        $info->food_processing = $request->input('food_processing');
        $info->mills = $request->input('mills');
        $info->tradition_mills = $request->input('tradition_mills');
        $info->oil_expeller = $request->input('oil_expeller');
        $info->corn_flake = $request->input('corn_flake');
        $info->electric_dryer = $request->input('electric_dryer');
        $info->potatoe_fryer = $request->input('potatoe_fryer');
        $info->power_tiller = $request->input('power_tiller');
        $info->tractor = $request->input('tractor');
        $info->transplanter = $request->input('transplanter');
        $info->grass_cutter = $request->input('grass_cutter');
        $info->green_house = $request->input('green_house');
        $info->save();
        return redirect('/agrifacility')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= AgriFacility::find($id);
        $info->delete();
        return redirect('/agrifacility')->with('success','Deleted successfully!!');
    }
}
