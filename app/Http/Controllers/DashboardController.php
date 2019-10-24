<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Population;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fyear=session('sess_Year').'-'.(session('sess_Year')+1);
        $population = DB::table('populations')
            ->where('year', '=', session('sess_Year'))
            ->get();
        $student = DB::table('school_student_infos')
            ->where('year', '=', session('sess_Year'))
            ->get();
        $teacher = DB::table('schoolstaffinfos')
            ->where('year', '=', session('sess_Year'))
            ->get();
        $health = DB::table('general_infos')
            ->where('year', '=', session('sess_Year'))
            ->get();
        $profile = DB::table('profiles')
            ->join('sector', 'profiles.sector', '=', 'sector.id')
            ->join('subsector', 'profiles.subsector', '=', 'subsector.id')
            ->join('designations', 'profiles.designation', '=', 'designations.id')
            ->join('qualifications', 'profiles.qualification', '=', 'qualifications.id')
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'profiles.dob', 'profiles.sex', 'profiles.cid_number', 'profiles.email', 'profiles.photo', 'profiles.id',
            'sector.sector', 'subsector.subsector', 'designations.designation', 'qualifications.qualification')
            ->paginate(5);
        $activity = DB::table('activities')
            ->join('sector', 'activities.sector', '=', 'sector.id')
            ->where('f_year', '=', $fyear)
            ->where('status', '=', 'N')
            ->orderBy('edate', 'desc')
            ->select('activities.id', 'activities.f_year', 'activities.activity', 
            'activities.sdate', 'activities.edate', 'sector.sector', 'activities.allotted_budget')
            ->limit(11)->get();
        return view('dashboard')->with('populations',$population)
            ->with('students',$student)
            ->with('teachers',$teacher)
            ->with('activity',$activity)
            ->with('healths',$health)
            ->with('profiles',$profile);
    }
    public function populationage()
    {
        $population = DB::table('populations')
            ->join('age_groups', 'populations.age_id', '=', 'age_groups.id')
            ->where('populations.year', '=', session('sess_Year'))
            ->groupBy('populations.age_id')
            ->orderBy('populations.year', 'desc')
            ->orderBy('populations.age_id')
            ->select('populations.id', 'populations.year', 
                DB::raw('SUM(populations.mtot) as mtot,SUM(populations.ftot) as ftot,SUM(populations.tot) as tot'), 
                'age_groups.age_group')
            ->get();
            return view('population.general.populationage')->with('populations',$population);
    }
    public function populationplace()
    {
        $population = DB::table('populations')
            ->join('subsector', 'populations.subsector', '=', 'subsector.id')
            ->join('age_groups', 'populations.age_id', '=', 'age_groups.id')
            ->where('populations.year', '=', session('sess_Year'))
            ->orderBy('populations.year', 'desc')
            ->orderBy('populations.subsector')
            ->orderBy('populations.age_id')
            ->select('populations.id', 'populations.year', 'populations.mtot', 
            'populations.ftot', 'populations.tot', 'subsector.subsector', 'age_groups.age_group')
            ->get();
            return view('population.general.populationplace')->with('populations',$population);
    }
    public function health_info()
    {
        $info = DB::table('general_infos')
            ->join('subsector', 'general_infos.subsector', '=', 'subsector.id')
            ->join('health_types', 'general_infos.type', '=', 'health_types.id')
            ->where('general_infos.year', '=', session('sess_Year'))
            ->orderBy('general_infos.subsector')
            ->orderBy('general_infos.type')
            ->select('general_infos.id', 'general_infos.year', 'general_infos.ambulance', 
            'general_infos.doctor','general_infos.dungtsho','general_infos.clinicofficer','general_infos.asstclinicofficer',
            'general_infos.ha','general_infos.bhw','general_infos.physiotherapists','general_infos.nurses',
            'general_infos.sowamenpa','general_infos.pharmacists','general_infos.technicians','general_infos.labtechonologist',
            'general_infos.vhw', 'general_infos.supportstaff', 'subsector.subsector', 'health_types.type')
            ->get();
            return view('health.general.info')->with('info',$info);
    }
    public function morbidity()
    {
        $info = DB::table('morbidities')
            ->join('morbidity_type', 'morbidities.morbidity', '=', 'morbidity_type.id')
            ->where('morbidities.year', '=', session('sess_Year'))
            ->orderBy('morbidities.morbidity')
            ->groupBy('morbidities.morbidity')
            ->select('morbidities.id',
            DB::raw('SUM(morbidities.male) as male,SUM(morbidities.female) as female,SUM(morbidities.total) as total'),
            'morbidity_type.morbidity')
            ->get();
            return view('health.general.morbidity')->with('info',$info);
    }
    public function morbidityby()
    {
        $info = DB::table('morbidities')
            ->join('subsector', 'morbidities.subsector', '=', 'subsector.id')
            ->join('morbidity_type', 'morbidities.morbidity', '=', 'morbidity_type.id')
            ->where('morbidities.year', '=', session('sess_Year'))
            ->orderBy('morbidities.morbidity')
            ->groupBy('morbidities.morbidity')
            ->select('morbidities.id',
            DB::raw('SUM(morbidities.male) as male,SUM(morbidities.female) as female,SUM(morbidities.total) as total'),
            'morbidity_type.morbidity','subsector.subsector')
            ->get();
            return view('health.general.morbidityby')->with('info',$info);
    }
    public function student_info()
    {
        $students = DB::table('school_student_infos')
            ->join('class', 'school_student_infos.class', '=', 'class.id')
            ->join('student_ages', 'school_student_infos.agerange', '=', 'student_ages.id')
            ->where('school_student_infos.year', '=', session('sess_Year'))
            ->orderBy('school_student_infos.class')
            ->groupBy('school_student_infos.agerange')
            ->select('school_student_infos.id', 'school_student_infos.year', 
            DB::raw('SUM(school_student_infos.male) as male,SUM(school_student_infos.female) as female'),
            'class.class', 'student_ages.age')
            ->get();
            return view('school.general.std-info')->with('students',$students);
    }
    public function student_sch()
    {
        $students = DB::table('school_student_infos')
            ->join('subsector', 'school_student_infos.subsector', '=', 'subsector.id')
            ->join('class', 'school_student_infos.class', '=', 'class.id')
            ->join('student_ages', 'school_student_infos.agerange', '=', 'student_ages.id')
            ->where('school_student_infos.year', '=', session('sess_Year'))
            ->orderBy('school_student_infos.class')
            ->groupBy('school_student_infos.agerange')
            ->select('school_student_infos.id', 'school_student_infos.year', 'subsector.subsector',
            DB::raw('SUM(school_student_infos.male) as male,SUM(school_student_infos.female) as female'),
            'class.class', 'student_ages.age')
            ->get();
            return view('school.general.std-info-sch')->with('students',$students);
    }
    public function student_staff()
    {
        $staffs = DB::table('schoolstaffinfos')
            ->join('subsector', 'schoolstaffinfos.subsector', '=', 'subsector.id')
            ->where('schoolstaffinfos.year', '=', session('sess_Year'))
            ->orderBy('subsector.subsector')
            ->get();
            return view('school.general.staff-info')->with('staffs',$staffs);
    }
    public function livestock()
    {
        $livestock = DB::table('livestockgenerals')
            ->join('animal_types', 'livestockgenerals.animal_types', '=', 'animal_types.id')
            ->where('livestockgenerals.year', '=', session('sess_Year'))
            ->groupBy('livestockgenerals.animal_types')
            ->select('livestockgenerals.id', 'animal_types.animal',
            DB::raw('SUM(livestockgenerals.total) as total'))
            ->get();
            return view('livestock.view.livestock-info')->with('livestock',$livestock);
    }
    public function livestock_gewog()
    {
        $livestock = DB::table('livestockgenerals')
            ->join('subsector', 'livestockgenerals.subsector', '=', 'subsector.id')
            ->join('animal_types', 'livestockgenerals.animal_types', '=', 'animal_types.id')
            ->where('livestockgenerals.year', '=', session('sess_Year'))
            ->orderBy('subsector.subsector')
            ->get();
            return view('livestock.view.livestock-info-sector')->with('livestock',$livestock);
    }
    public function livestock_product()
    {
        $livestock = DB::table('livestockproductions')
            ->join('ls_product_types', 'livestockproductions.products', '=', 'ls_product_types.id')
            ->where('livestockproductions.year', '=', session('sess_Year'))
            ->groupBy('livestockproductions.products')
            ->select('livestockproductions.id', 'ls_product_types.products',
            DB::raw('SUM(livestockproductions.total) as total'))
            ->get();
            return view('livestock.view.livestock-product-info')->with('livestock',$livestock);
    }
    public function livestock_product_gewog()
    {
        $livestock = DB::table('livestockproductions')
            ->join('subsector', 'livestockproductions.subsector', '=', 'subsector.id')
            ->join('ls_product_types', 'livestockproductions.products', '=', 'ls_product_types.id')
            ->where('livestockproductions.year', '=', session('sess_Year'))
            ->orderBy('subsector.subsector')
            ->get();
            return view('livestock.view.livestock-product-sector')->with('livestock',$livestock);
    }
    public function agriculture()
    {
        $agriculture = DB::table('agrigenerals')
            ->where('agrigenerals.year', '=', session('sess_Year'))
            ->select('agrigenerals.id',
            DB::raw('SUM(agrigenerals.dry) as dry, SUM(agrigenerals.wet) as wet, SUM(agrigenerals.orchad) as orchad,
            SUM(agrigenerals.f_irrigation) as f_irrigation,SUM(agrigenerals.n_irrigation) as n_irrigation,SUM(agrigenerals.l_irrigation) as l_irrigation,
            SUM(agrigenerals.area_irrigation) as area_irrigation,SUM(agrigenerals.benefit_irrigation) as benefit_irrigation,
            SUM(agrigenerals.processing_unit) as processing_unit,SUM(agrigenerals.mills) as mills'))
            ->get();
            return view('agriculture.view.agri-info')->with('agriculture',$agriculture);
    }
    public function agriculture_gewog()
    {
        $agriculture = DB::table('agrigenerals')
            ->join('subsector', 'agrigenerals.subsector', '=', 'subsector.id')
            ->where('agrigenerals.year', '=', session('sess_Year'))
            ->get();
            return view('agriculture.view.agri-info-sector')->with('agriculture',$agriculture);
    }
    public function agriculture_product()
    {
        $agriculture = DB::table('agriproductions')
            ->join('subsector', 'agriproductions.subsector', '=', 'subsector.id')
            ->join('agricategories', 'agriproductions.category', '=', 'agricategories.id')
            ->join('agriproducts', 'agriproductions.products', '=', 'agriproducts.id')
            ->where('agriproductions.year', '=', session('sess_Year'))
            ->groupBy('agriproductions.products')
            ->select('agriproductions.id',
            DB::raw('SUM(agriproductions.area_number) as area, SUM(agriproductions.productions) as productions'),
            'agricategories.category','agriproducts.product')
            ->get();
            return view('agriculture.view.agri-product')->with('agriculture',$agriculture);
    }
    public function agriculture_product_gewog()
    {
        $agriculture = DB::table('agriproductions')
            ->join('subsector', 'agriproductions.subsector', '=', 'subsector.id')
            ->join('agricategories', 'agriproductions.category', '=', 'agricategories.id')
            ->join('agriproducts', 'agriproductions.products', '=', 'agriproducts.id')
            ->where('agriproductions.year', '=', session('sess_Year'))
            ->select('agriproductions.id','agriproductions.area_number', 'agriproductions.productions',
            'agricategories.category','agriproducts.product','subsector.subsector')
            ->get();
            return view('agriculture.view.agri-product-gewog')->with('agriculture',$agriculture);
    }
    public function emp_all()
    {
        $profile = DB::table('profiles')
            ->join('sector', 'profiles.sector', '=', 'sector.id')
            ->join('subsector', 'profiles.subsector', '=', 'subsector.id')
            ->join('designations', 'profiles.designation', '=', 'designations.id')
            ->join('qualifications', 'profiles.qualification', '=', 'qualifications.id')
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'profiles.dob', 'profiles.sex', 'profiles.cid_number', 'profiles.email', 'profiles.photo', 'profiles.id',
            'sector.sector', 'subsector.subsector', 'designations.designation', 'qualifications.qualification')
            ->get();
            return view('profile.general.emp_all')->with('profiles',$profile);
    }
    public function emp_show($id)
    {
        $profile = DB::table('profiles')
            ->join('sector', 'profiles.sector', '=', 'sector.id')
            ->join('subsector', 'profiles.subsector', '=', 'subsector.id')
            ->join('designations', 'profiles.designation', '=', 'designations.id')
            ->join('qualifications', 'profiles.qualification', '=', 'qualifications.id')
            ->where('profiles.id', '=', $id)
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'profiles.dob', 'profiles.sex', 'profiles.cid_number', 'profiles.email', 'profiles.photo', 'profiles.id',
            'sector.sector', 'subsector.subsector', 'designations.designation', 'qualifications.qualification')
            ->get();
        //$profile=Profile::find($id);
        //return $profile;
        return view('profile.general.emp_show')->with('profiles',$profile);
    }
    public function emp_history($id)
    {
        $history = DB::table('histories')
            ->join('profiles', 'histories.employee_id', '=', 'profiles.employee_id')
            ->where('histories.employee_id', '=', $id)
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'histories.id', 'histories.place', 'histories.job', 'histories.from', 'histories.to')
            ->get();
        //$history=history::find($id);
        //return $history;
        return view('profile.general.emp_history')->with('historys',$history);
    }
    public function activity_show($id)
    {
        $activity = DB::table('activities')
            ->join('sector', 'activities.sector', '=', 'sector.id')
            ->join('subsector', 'activities.subsector', '=', 'subsector.id')
            ->join('budgets', 'activities.budget', '=', 'budgets.id')
            ->where('activities.id', '=', $id)
            ->select('activities.id', 'activities.f_year', 
            'activities.activity', 'activities.budget_line', 'activities.allotted_budget', 'activities.sdate', 'activities.edate', 'activities.status',
            'sector.sector', 'subsector.subsector', 'budgets.budget')
            ->get();
        //$activity=activity::find($id);
        //return $activity;
        return view('activity.general.show')->with('activitys',$activity);
    }
}
