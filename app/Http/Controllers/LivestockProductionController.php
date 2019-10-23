<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Livestockproduction;
use DB;

class LivestockProductionController extends Controller
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
        $info = DB::table('Livestockproductions')
            ->join('ls_product_types', 'Livestockproductions.products', '=', 'ls_product_types.id')
            ->where('Livestockproductions.subsector', '=', session('SUBSEC'))
            ->orderBy('Livestockproductions.year', 'desc')
            ->orderBy('ls_product_types.id')
            ->select('Livestockproductions.id', 'Livestockproductions.year', 'Livestockproductions.total', 
                'ls_product_types.products')
            ->paginate(10);
        return view('livestock.production.index')->with('info',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal=DB::table('ls_product_types')
            ->get();
        return view('livestock.production.create')->with('animal',$animal);
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

        $info = new Livestockproduction;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->products = $request->input('animal');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/livestockproduction')->with('success','Saved successfully!!');
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
        $animal=DB::table('ls_product_types')
            ->get();
        $info=Livestockproduction::find($id);
        return view('livestock.production.edit')->with('info',$info)->with('animal',$animal);
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
        
        $info = Livestockproduction::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->products = $request->input('animal');
        $info->total = $request->input('total');
        $info->save();
        return redirect('/livestockproduction')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= Livestockproduction::find($id);
        $info->delete();
        return redirect('/livestockproduction')->with('success','Deleted successfully!!');
    }
}
