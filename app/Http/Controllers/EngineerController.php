<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Engineer;
use App\Activity;
use DB;

class EngineerController extends Controller
{
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
        $sitevisit = DB::table('engineers')
            ->join('activities','engineers.activity', '=', 'activities.id')
            ->join('status','engineers.status', '=', 'status.id')
            ->where('engineers.engineer', '=', session('EMPID'))
            ->orderBy('engineers.visit_date','DESC')
            ->select('engineers.id','engineers.visit_date','status.status','engineers.observation',
                'activities.activity')
            ->paginate(10);
        return view('engineer.visit.index')->with('sitevisit',$sitevisit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = DB::table('status')
            ->where('status.id', '!=', 'N')
            ->get();
        $activity = DB::table('activities')
            ->where('activities.site_engineer', '=', session('EMPID'))
            ->get();
        return view('engineer.visit.create')->with('activity',$activity)
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
            'activity' =>'required',
            'date' =>'required',
            'des' =>'required',
            'status' =>'required'
        ]);
        $id= $request->input('activity');
        $sitevisit = new Engineer;
        $sitevisit->subsector = session('SUBSEC');
        $sitevisit->engineer = session('EMPID');
        $sitevisit->activity = $request->input('activity');
        $sitevisit->observation = $request->input('des');
        $sitevisit->visit_date = $request->input('date');
        $sitevisit->status = $request->input('status');
        $sitevisit->save();
        DB::table('activities')
            ->where('id', $id)
            ->update(['status' => $request->input('status')]);
        return redirect('/engineer')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infras = DB::table('engineers')
            ->join('heritage_type','engineers.heritage_type', '=', 'heritage_type.id')
            ->where('engineers.subsector', '=', session('SUBSEC'))
            ->where('engineers.id', '=', $id)
            ->select('engineers.id','engineers.sitename','engineers.location','engineers.estdyear','engineers.description','engineers.photo',
                'heritage_type.heritage_type')
            ->get();
        return view('culture.show')->with('infras',$infras);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sitevisit=Engineer::find($id);
        $status=DB::table('status')
            ->get();
        $activity = DB::table('activities')
            ->where('activities.site_engineer', '=', session('EMPID'))
            ->get();
        return view('engineer.visit.edit')->with('sitevisit',$sitevisit)
        ->with('status',$status)
        ->with('activity',$activity);
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
            'activity' =>'required',
            'date' =>'required',
            'des' =>'required',
            'status' =>'required'
        ]);
        
        $sitevisit = Engineer::find($id);
        $sitevisit->activity = $request->input('activity');
        $sitevisit->observation = $request->input('des');
        $sitevisit->visit_date = $request->input('date');
        $sitevisit->status = $request->input('status');
        $sitevisit->save();
        DB::table('activities')
            ->where('id', $id)
            ->update(['status' => $request->input('status')]);
        return redirect('/engineer')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sitevisit= Engineer::find($id);
        $sitevisit->delete();
        return redirect('/engineer')->with('success','Deleted successfully!!');
    }
}