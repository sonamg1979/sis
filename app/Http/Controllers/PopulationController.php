<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Population;
use DB;

class PopulationController extends Controller
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
        //$population = Population::where('votes', '>', 100)->paginate(16);
        //$population=DB::table('populations')->orderBy('year', 'desc')->paginate(16);
        $population = DB::table('populations')
            ->join('subsector', 'populations.subsector', '=', 'subsector.id')
            ->join('age_groups', 'populations.age_id', '=', 'age_groups.id')
            ->where('populations.subsector', '=', session('SUBSEC'))
            ->orderBy('populations.year', 'desc')
            ->orderBy('populations.subsector')
            ->orderBy('populations.age_id')
            ->select('populations.id', 'populations.year', 'populations.mtot', 
            'populations.ftot', 'populations.tot', 'subsector.subsector', 'age_groups.age_group')
            ->paginate(16);


        return view('population.index')->with('populations',$population);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=DB::table('age_groups')
            ->get();
        return view('population.create')->with('groups',$groups);
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
            'age_group' =>'required',
            'male' =>'required',
            'female' =>'required'
        ]);

        $population = new Population;
        $population->subsector = session('SUBSEC');
        $population->year = $request->input('year');
        $population->age_id = $request->input('age_group');
        $population->mtot = $request->input('male');
        $population->ftot = $request->input('female');
        $population->tot = ($request->input('male') + $request->input('female'));
        $population->save();
        return redirect('/population')->with('success','Saved successfully!!');
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
        $groups=DB::table('age_groups')
            ->get();
        $population=Population::find($id);
        return view('population.edit')->with('populations',$population)->with('groups',$groups);
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
            'age_group' =>'required',
            'male' =>'required',
            'female' =>'required'
        ]);
        
        $population = Population::find($id);
        $population->subsector = session('SUBSEC');
        $population->year = $request->input('year');
        $population->age_id = $request->input('age_group');
        $population->mtot = $request->input('male');
        $population->ftot = $request->input('female');
        $population->tot = ($request->input('male') + $request->input('female'));
        $population->save();
        return redirect('/population')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $population= Population::find($id);
        $population->delete();
        return redirect('/population')->with('success','Deleted successfully!!');
    }
}
