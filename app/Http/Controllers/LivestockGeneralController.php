<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Livestockgeneral;
use DB;

class LivestockGeneralController extends Controller
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
        $info = DB::table('livestockgenerals')
            ->join('animal_types', 'livestockgenerals.animal_types', '=', 'animal_types.id')
            ->where('livestockgenerals.subsector', '=', session('SUBSEC'))
            ->orderBy('livestockgenerals.year', 'desc')
            ->orderBy('animal_types.id')
            ->select('livestockgenerals.id', 'livestockgenerals.year', 'livestockgenerals.total', 
                'animal_types.animal')
            ->paginate(10);
        return view('livestock.general.index')->with('info',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal=DB::table('animal_types')
            ->get();
        return view('livestock.general.create')->with('animal',$animal);
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
            'animal' =>'required'
        ]);

        $info = new Livestockgeneral;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->animal_types = $request->input('animal');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/livestockgeneral')->with('success','Saved successfully!!');
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
        $animal=DB::table('animal_types')
            ->get();
        $info=Livestockgeneral::find($id);
        return view('livestock.general.edit')->with('info',$info)->with('animal',$animal);
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
            'animal' =>'required'
        ]);
        
        $info = Livestockgeneral::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->animal_types = $request->input('animal');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/livestockgeneral')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Livestockgeneral::find($id);
        $info->delete();
        return redirect('/livestockgeneral')->with('success','Deleted successfully!!');
    }
}
