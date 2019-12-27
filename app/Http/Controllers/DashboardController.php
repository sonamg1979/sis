<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Population;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $fyear=session('sess_Year').'-'.(session('sess_Year')+1);
        $month=Carbon::now()->format('m');
        $events = DB::table('events')
            ->join('subsector', 'events.subsector', '=', 'subsector.id')
            ->where('events.sdate', '>=', now())
            ->orderBy('events.sdate','asc')
            ->select('events.id', 'events.events', 
            'events.sdate', 'events.edate', 'subsector.subsector')
            ->paginate(10);
        $profile = DB::table('profiles')
            ->join('sector', 'profiles.sector', '=', 'sector.id')
            ->join('subsector', 'profiles.subsector', '=', 'subsector.id')
            ->join('designations', 'profiles.designation', '=', 'designations.id')
            ->join('qualifications', 'profiles.qualification', '=', 'qualifications.id')
            ->orderBy('designations.position','asc')
            ->select('profiles.employee_id', 'profiles.employee_name', 
            'profiles.dob', 'profiles.sex', 'profiles.cid_number', 'profiles.email', 'profiles.photo', 'profiles.id',
            'sector.sector', 'subsector.subsector', 'designations.designation', 'qualifications.qualification')
            ->paginate(5);
        $acty = DB::table('activities')
            ->join('subsector', 'activities.subsector', '=', 'subsector.id')
            ->where('f_year', '=', $fyear)
            ->orderBy('edate', 'asc')
            ->select('activities.id', 'activities.f_year', 'activities.activity', 
            'activities.sdate', 'activities.edate','subsector.subsector' , 'activities.allotted_budget')
            ->paginate(10);
        return view('dashboard')
            ->with('acty',$acty)
            ->with('events',$events)
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
    public function student_info_class()
    {
        $students = DB::table('school_student_infos')
            ->join('class', 'school_student_infos.class', '=', 'class.id')
            ->join('student_ages', 'school_student_infos.agerange', '=', 'student_ages.id')
            ->where('school_student_infos.year', '=', session('sess_Year'))
            ->orderBy('class.id')
            ->groupBy('school_student_infos.class')
            ->select('school_student_infos.id', 'school_student_infos.year', 
            DB::raw('SUM(school_student_infos.male) as male,SUM(school_student_infos.female) as female'),
            'class.class')
            ->get();
            return view('school.general.std-info-class')->with('students',$students);
    }
    public function student_sch()
    {
        $students = DB::table('school_student_infos')
            ->join('subsector', 'school_student_infos.subsector', '=', 'subsector.id')
            ->join('class', 'school_student_infos.class', '=', 'class.id')
            ->where('school_student_infos.year', '=', session('sess_Year'))
            ->orderBy('subsector.subsector')
            ->groupBy('subsector.subsector','school_student_infos.class')
            ->select('school_student_infos.id', 'school_student_infos.year', 'subsector.subsector','class.class',
            DB::raw('SUM(school_student_infos.male) as male,SUM(school_student_infos.female) as female'))
            ->get();
            return view('school.general.std-info-sch')->with('students',$students);
    }
    public function student_school()
    {
        $students = DB::table('school_student_infos')
            ->join('subsector', 'school_student_infos.subsector', '=', 'subsector.id')
            ->where('school_student_infos.year', '=', session('sess_Year'))
            ->groupBy('school_student_infos.subsector')
            ->orderBy('subsector.subsector')
            ->select('school_student_infos.id', 'school_student_infos.year', 'subsector.subsector',
            DB::raw('SUM(school_student_infos.male) as male,SUM(school_student_infos.female) as female'))
            ->get();
            return view('school.general.std-info-school')->with('students',$students);
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
            ->orderBy('designations.position','asc')
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
            ->join('profiles', 'activities.site_engineer', '=', 'profiles.employee_id')
            ->where('activities.id', '=', $id)
            ->select('activities.id', 'activities.f_year', 
            'activities.activity', 'activities.budget_line', 'activities.allotted_budget', 'activities.sdate', 'activities.edate', 'activities.status',
            'sector.sector', 'subsector.subsector', 'budgets.budget','profiles.employee_name')
            ->get();
        //$activity=activity::find($id);
        //return $activity;
        return view('activity.general.show')->with('activitys',$activity);
    }
    public function visit_history($id)
    {
        $history = DB::table('engineers')
            ->where('activity', '=', $id)
            ->get();
        //$history=history::find($id);
        //return $history;
        return view('activity.general.visit')->with('history',$history);
    }
    public function activity_show_all()
    {
        $activity = DB::table('activities')
            ->join('sector', 'activities.sector', '=', 'sector.id')
            ->join('status', 'activities.status', '=', 'status.id')
            ->join('subsector', 'activities.subsector', '=', 'subsector.id')
            ->join('budgets', 'activities.budget', '=', 'budgets.id')
            ->join('profiles', 'activities.site_engineer', '=', 'profiles.employee_id')
            ->select('activities.id', 'activities.f_year', 
            'activities.activity', 'activities.budget_line', 'activities.allotted_budget', 'activities.sdate', 'activities.edate', 'status.status',
            'sector.sector', 'subsector.subsector', 'budgets.budget','profiles.employee_name')
            ->paginate(20);
        //$activity=activity::find($id);
        //return $activity;
        return view('activity.general.all')->with('activitys',$activity);
    }
    public function focus_all()
    {
        $focus = DB::table('primary_foci')
            ->join('subsector', 'subsector.id', '=', 'primary_foci.subsector')
            ->where('primary_foci.year', '=', session('sess_Year'))
            ->select('primary_foci.id', 'primary_foci.year', 'primary_foci.title', 'primary_foci.description', 'primary_foci.budget', 'primary_foci.complete_date',
                'subsector.subsector')
            ->paginate(10);
        return view('focus.general.all')->with('focus',$focus);
    }
    public function culture_all()
    {
        $infras = DB::table('cultures')
            ->join('heritage_type','cultures.heritage_type', '=', 'heritage_type.id')
            ->select('cultures.id','cultures.sitename','cultures.location','cultures.estdyear',
                'heritage_type.heritage_type')
            ->paginate(10);
        return view('culture.general.index')->with('infras',$infras);
    }
    public function culture_show($id)
    {
        $infras = DB::table('cultures')
            ->join('heritage_type','cultures.heritage_type', '=', 'heritage_type.id')
            ->where('cultures.id', '=', $id)
            ->select('cultures.id','cultures.sitename','cultures.location','cultures.estdyear','cultures.description','cultures.photo',
                'heritage_type.heritage_type')
            ->get();
        return view('culture.general.show')->with('infras',$infras);
    }
    public function school_details()
    {
        //$infras = SchoolInfra::paginate(10);
        $infras = DB::table('school_infras')
            ->join('school_level','school_infras.schoollevel', '=', 'school_level.id')
            ->select('school_infras.id','school_infras.schoolname','school_infras.location',
                'school_infras.area','school_infras.estdyear','school_infras.classroom','school_infras.hall',
                'school_infras.football','school_infras.volleyball','school_infras.basketball','school_infras.indoor',
                'school_level.schoollevel')
            ->get();
        ;
        return view('school.general.school')->with('infras',$infras);
    }
    public function agri_facilities()
    {
        $activity = DB::table('agri_facilities')
            ->join('subsector', 'agri_facilities.subsector', '=', 'subsector.id')
            ->select('agri_facilities.id', DB::raw('sum(agri_facilities.wet) as wet, sum(agri_facilities.c_wet) as c_wet,
            sum(agri_facilities.dry) as dry, sum(agri_facilities.C_dry) as c_dry,sum(agri_facilities.orchard) as orchard,
            sum(agri_facilities.c_orchard) as c_orchard, sum(agri_facilities.food_processing) as food_processing,
            sum(agri_facilities.mills) as mills, sum(agri_facilities.tradition_mills) as tradition_mills,
            sum(agri_facilities.oil_expeller) as oil_expeller, sum(agri_facilities.corn_flake) as corn_flake,
            sum(agri_facilities.electric_dryer) as electric_dryer, sum(agri_facilities.potatoe_fryer) as potatoe_fryer,
            sum(agri_facilities.power_tiller) as power_tiller, sum(agri_facilities.tractor) as tractor,
            sum(agri_facilities.transplanter) as transplanter, sum(agri_facilities.grass_cutter) as grass_cutter,
            sum(agri_facilities.green_house) as green_house'))
            ->get();
        return view('agriculture.general.facilities')->with('activitys',$activity);
    }
    public function agri_farm_group()
    {
        $activity = DB::table('farm_groups')
            ->join('subsector', 'farm_groups.subsector', '=', 'subsector.id')
            ->orderBy('farm_groups.year', 'asc')
            ->get();
        return view('agriculture.general.farm_group')->with('datas',$activity);
    }
    public function agri_irrigation()
    {
        $info = DB::table('agrigenerals')
            ->join('construct_types', 'agrigenerals.construct_type', '=', 'construct_types.id')
            ->join('construct_modes', 'agrigenerals.construct_mode', '=', 'construct_modes.id')
            ->join('chennel_types', 'agrigenerals.chennel_type', '=', 'chennel_types.id')
            ->join('subsector', 'agrigenerals.subsector', '=', 'subsector.id')
            ->select('agrigenerals.id', 'agrigenerals.location', 'agrigenerals.length', 
            'agrigenerals.benefeciaries', 'agrigenerals.area', 'agrigenerals.year',
            'agrigenerals.associations', 'agrigenerals.male', 'agrigenerals.female', 'subsector.subsector',
            'agrigenerals.status', 'construct_modes.construct_mode', 'construct_types.construct_type','chennel_types.chennel_type')
            ->paginate(10);
        return view('agriculture.general.irrigation')->with('datas',$info);
    }
    public function agri_farm_road()
    {
        $info = DB::table('farm_roads')
            ->join('construct_types', 'farm_roads.construct_type', '=', 'construct_types.id')
            ->join('construct_modes', 'farm_roads.construct_mode', '=', 'construct_modes.id')
            ->join('subsector', 'farm_roads.subsector', '=', 'subsector.id')
            ->select('farm_roads.id', 'farm_roads.road_name', 'farm_roads.chiwog', 'farm_roads.length', 
            'farm_roads.benefeciaries', 'farm_roads.year',
            'farm_roads.group', 'farm_roads.male', 'farm_roads.female', 'subsector.subsector',
            'farm_roads.status', 'construct_modes.construct_mode', 'construct_types.construct_type')
            ->get();
        return view('agriculture.general.farm_road')->with('datas',$info);
    }
    public function agri_electric_fencing()
    {
        $info = DB::table('electric_fencings')
            ->join('status', 'electric_fencings.status', '=', 'status.id')
            ->join('fencing_type', 'electric_fencings.type', '=', 'fencing_type.id')
            ->join('subsector', 'electric_fencings.subsector', '=', 'subsector.id')
            ->select('electric_fencings.id', 'electric_fencings.location', 'electric_fencings.year', 
            'electric_fencings.beneficiaries', 'electric_fencings.wet', 'electric_fencings.dry', 'subsector.subsector',
            'electric_fencings.length', 'electric_fencings.remarks', 'status.status', 'fencing_type.type')
            ->get();
        return view('agriculture.general.electric_fencing')->with('datas',$info);
    }
    public function agri_land_development()
    {
        $info = DB::table('land_developments')
        ->join('subsector', 'land_developments.subsector', '=', 'subsector.id')
        ->get();
        return view('agriculture.general.land_development')->with('datas',$info);
    }
    public function livestock_infra()
    {
        $group = DB::table('livestock_infras')
        ->select(DB::raw('sum(livestock_infras.ais) as ais, sum(livestock_infras.biogas) as biogas,
        sum(livestock_infras.poultry_micro) as poultry_micro, sum(livestock_infras.poultry_commercial) as poultry_commercial,
        sum(livestock_infras.poultry_broiler) as poultry_broiler, sum(livestock_infras.diary_micro) as diary_micro,
        sum(livestock_infras.diary_commercial) as diary_commercial, sum(livestock_infras.milk_processing) as milk_processing'))
        ->get();
        return view('livestock.view.infra')->with('datas',$group);
    }
    public function livestock_group()
    {
        $info = DB::table('livestock_groups')
        ->join('subsector', 'livestock_groups.subsector', '=', 'subsector.id')
        ->get();
        return view('livestock.view.group')->with('datas',$info);
    }
}
