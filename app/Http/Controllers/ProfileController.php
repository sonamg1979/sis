<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use App\Profile;
use App\Designation;
use DB;

class ProfileController extends Controller
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
        $profile = DB::table('profiles')
            ->where('subsector', '=', session('SUBSEC'))
            ->paginate(10);
        ;
        return view('profile.index')->with('profiles',$profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations=DB::table('designations')
            ->get();
        $qualifications=DB::table('qualifications')
            ->get();
        return view('profile.create')->with('designations',$designations)->with('qualifications',$qualifications);
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
            'employee_id' =>'required|numeric',
            'employee_name' =>'required',
            'sex' =>'required',
            'dob' =>'required',
            'cid' =>'required|numeric',
            'citizen' =>'required',
            'type' =>'required',
            'cid' =>'required',
            'email' =>'required|email',
            'qualification' =>'required',
            'designation' =>'required',
            'passport' =>'image|nullable|max:1999'
        ]);
        
        //Photo upload handle
        if($request->hasFile('passport')){
            //getfile
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            //save file with timestamp
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('passport')->getClientOriginalExtension();
            //file to save
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('passport')->storeAs('public/images',$fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $profile = new Profile;
        $profile->sector = session('SEC');
        $profile->subsector = session('SUBSEC');
        $profile->employee_id = $request->input('employee_id');
        $profile->employee_name = $request->input('employee_name');
        $profile->dob = $request->input('dob');
        $profile->sex = $request->input('sex');
        $profile->citizen = $request->input('citizen');
        $profile->type = $request->input('type');
        $profile->cid_number = $request->input('cid');
        $profile->email = $request->input('email');
        $profile->designation = $request->input('designation');
        $profile->qualification = $request->input('qualification');
        $profile->photo = $fileNameToStore;
        $profile->save();
        return redirect('/profile')->with('success','Saved successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        return view('profile.show')->with('profiles',$profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designations=DB::table('designations')
            ->get();
        $qualifications=DB::table('qualifications')
            ->get();
        $profile=Profile::find($id);
        return view('profile.edit')->with('profiles',$profile)->with('designations',$designations)->with('qualifications',$qualifications);
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
            'employee_id' =>'required|numeric',
            'employee_name' =>'required',
            'sex' =>'required',
            'citizen' =>'required',
            'type' =>'required',
            'dob' =>'required',
            'cid' =>'required|numeric',
            'email' =>'required',
            'passport' =>'image|nullable|max:1999'
        ]);
        if($request->hasFile('passport')){
            //getfile
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            //save file with timestamp
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('passport')->getClientOriginalExtension();
            //file to save
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('passport')->storeAs('public/images',$fileNameToStore);
        } 
        
        $profile = Profile::find($id);
        $profile->employee_id = $request->input('employee_id');
        $profile->employee_name = $request->input('employee_name');
        $profile->dob = $request->input('dob');
        $profile->sex = $request->input('sex');
        $profile->citizen = $request->input('citizen');
        $profile->type = $request->input('type');
        $profile->cid_number = $request->input('cid');
        $profile->email = $request->input('email');
        $profile->designation = $request->input('designation');;
        $profile->qualification = $request->input('qualification');;
        if($request->hasFile('passport')){
            $profile->photo = $fileNameToStore;
        }
        $profile->save();
        return redirect('/profile')->with('success','Updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile= Profile::find($id);
        if($profile->photo !== 'noimage.jpg'){
            //delete image
            Storage::delete('public/images/'.$profile->photo);
        }
        $profile->delete();
        return redirect('/profile')->with('success','Deleted successfully!!');
    }
}
