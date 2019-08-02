<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Refer;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties=Specialty::all();

        return view('doctor.dashboard',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient=new Patient();
        $patient->name=$request->name;
        $patient->age=$request->age;
        $patient->tel=$request->tel;
        $patient->status=0;
        $patient->specialty_id=$request->specialty_id;
        $patient->save();
        Session::flash('message', 'Patient Created successfully');
        return redirect('doctor/patients');
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
    public  function refer($id){
        $disease=Patient::where('id','=',$id)->get();
        $result=$disease->pluck('specialty_id');
        $users=User::where('specialty','=',$result)->get();
        $specialists=Specialty::orderBy('id','DESC')->get();
        $patient=Patient::where('id','=',$id)->get();
        return view('doctor.refer',compact('patient','specialists','users'));

    }
    public function all()
    {
        $patients=Patient::all();
        return view('doctor.patients',compact('patients'));
    }
    public  function refers(Request $request){

        $refer=new Refer();
        $refer->patient_id=$request->patient_id;
        $refer->speciality_id=$request->disease;
        $refer->specialist_id=$request->specialist_id;
        $refer->comment=$request->comment;
        $refer->save();
        Patient::where('id','=',$request->patient_id)->update(['status'=>1]);
        Session::flash('message', 'patient referred');
        return redirect('doctor/patients');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
