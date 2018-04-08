<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PatientHistoryController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $page_title = 'Patient History';


      $patient = DB::table('patients')
               ->select('name','medicare_no','registerBy')
               ->get();

      $patient_data = DB::table('patient_details')->get();

      return view('Patients.history',compact('page_title',$page_title))
                  ->with('patient',$patient)
                  ->with('patient_data',$patient_data);
  }
}
