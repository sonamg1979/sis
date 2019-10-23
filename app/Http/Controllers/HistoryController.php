<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\History;
use DB;

class HistoryController extends Controller
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
        //$history = History::paginate(10);
        $history = DB::table('profiles')
            ->join('histories', 'profiles.employee_id', '=', 'histories.employee_id')
            ->where('profiles.subsector', '=', session('SUBSEC'))
            ->groupBy('profiles.employee_id')
            ->paginate(10);
        return view('history.index')->with('historys',$history);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee=DB::table('profiles')
            ->get();
        return view('history.create')->with('employee',$employee);
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
            'employee_id' =>'required',
            'place' =>'required',
            'job' =>'required',
            'from' =>'required',
            'to' =>'required',
        ]);
        
        $history = new History;
        
        $history->employee_id = $request->input('employee_id');
        $history->place = $request->input('place');
        $history->job = $request->input('job');
        $history->from = $request->input('from');
        $history->to = $request->input('to');
        $history->save();
        return redirect('/history')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = DB::table('histories')
            ->join('profiles', 'histories.employee_id', '=', 'profiles.employee_id')
            ->where('histories.employee_id', '=', $id)
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'histories.id', 'histories.place', 'histories.job', 'histories.from', 'histories.to')
            ->paginate(5);
        //$history=history::find($id);
        //return $history;
        return view('history.history')->with('historys',$history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee=DB::table('profiles')
            ->get();
        $history=history::find($id);
        return view('history.edit')->with('employee',$employee)->with('historys',$history);
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
            'employee_id' =>'required',
            'place' =>'required',
            'job' =>'required',
            'from' =>'required',
            'to' =>'required',
        ]);

        $history = History::find($id);
        
        $history->employee_id = $request->input('employee_id');
        $history->place = $request->input('place');
        $history->job = $request->input('job');
        $history->from = $request->input('from');
        $history->to = $request->input('to');
        $history->save();
        return redirect('/history')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history= History::find($id); 
        $history->delete();
        return redirect('/history')->with('success','Deleted successfully!!');
    }
}
