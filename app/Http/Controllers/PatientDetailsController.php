<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Patient;
use App\Patient_details;
use DB;
use File;
use App\Http\Managers\PatientManager;

class PatientDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $patient =  Patient::select('medicare_no')->get();
        $patient = DB::table('patients')->select('medicare_no','name')->get();

        // $data = ['1','2','3'];
        // dd($patient);
        $page_title = 'Patient Checkup';
        return view('Patients.checkup',compact('page_title',$page_title))->with('patient',$patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $patient_details = PatientManager::setPatientCheckupDetails($request);
          return redirect('/home');

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

      // $data = Patient::find($id);
      $page_title = 'Edit Patient Checkup Detials';
      $data =DB::table('patient_details')->where('id','=',$id)->get();
      return view('Patients.edit',compact('page_title',$page_title))->with('patientData',$data);
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
