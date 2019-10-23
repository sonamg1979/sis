<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\GeneralInfo;
use DB;

class GeneralHealthController extends Controller
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
    public function group(){
        $id = Input::get('group');
        $group=DB::table('student_ages')
            ->where('class', '=', $id)
            ->get();
        return response()->json($group);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = DB::table('general_infos')
            ->join('health_types', 'general_infos.type', '=', 'health_types.id')
            ->where('general_infos.subsector', '=', session('SUBSEC'))
            ->orderBy('general_infos.year', 'desc')
            ->select('general_infos.id', 'general_infos.year', 'general_infos.ambulance', 
            'general_infos.doctor', 'health_types.type', 'general_infos.dungtsho','general_infos.clinicofficer',
            'general_infos.asstclinicofficer','general_infos.ha','general_infos.bhw',
            'general_infos.physiotherapists','general_infos.nurses','general_infos.sowamenpa'
            ,'general_infos.pharmacists','general_infos.technicians','general_infos.labtechonologist'
            ,'general_infos.vhw','general_infos.supportstaff')
            ->paginate(16);
        return view('health.general.index')->with('datas',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class=DB::table('health_types')
            ->get();
        return view('health.general.create')->with('type',$class);
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
            'type' =>'required',
        ]);

        $info = new GeneralInfo;
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->type = $request->input('type');
        $info->ambulance = $request->input('ambulance');
        $info->doctor = $request->input('doctor');
        $info->dungtsho = $request->input('drungtshos');
        $info->clinicofficer = $request->input('clinicalcfficers');
        $info->asstclinicofficer = $request->input('assclinicalcfficers');
        $info->ha = $request->input('ha');
        $info->bhw = $request->input('bhw');
        $info->physiotherapists = $request->input('physiotherapists');
        $info->nurses = $request->input('nurses');
        $info->sowamenpa = $request->input('sowamenpas');
        $info->pharmacists = $request->input('pharmacists');
        $info->technicians = $request->input('technicians');
        $info->labtechonologist = $request->input('technologists');
        $info->vhw = $request->input('vhw');
        $info->supportstaff = $request->input('staff');
        $info->save();
        return redirect('/general')->with('success','Saved successfully!!');
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
        $types=DB::table('health_types')
            ->get();
        $info=GeneralInfo::find($id);
        return view('health.general.edit')->with('infos',$info)->with('type',$types);
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
            'type' =>'required',
        ]);
        
        $info = GeneralInfo::find($id);
        $info->subsector = session('SUBSEC');
        $info->year = $request->input('year');
        $info->type = $request->input('type');
        $info->ambulance = $request->input('ambulance');
        $info->doctor = $request->input('doctor');
        $info->dungtsho = $request->input('drungtshos');
        $info->clinicofficer = $request->input('clinicalcfficers');
        $info->asstclinicofficer = $request->input('assclinicalcfficers');
        $info->ha = $request->input('ha');
        $info->bhw = $request->input('bhw');
        $info->physiotherapists = $request->input('physiotherapists');
        $info->nurses = $request->input('nurses');
        $info->sowamenpa = $request->input('sowamenpas');
        $info->pharmacists = $request->input('pharmacists');
        $info->technicians = $request->input('technicians');
        $info->labtechonologist = $request->input('technologists');
        $info->vhw = $request->input('vhw');
        $info->supportstaff = $request->input('staff');
        $info->save();
        return redirect('/general')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info= GeneralInfo::find($id);
        $info->delete();
        return redirect('/general')->with('success','Deleted successfully!!');
    }
}
