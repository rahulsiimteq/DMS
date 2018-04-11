<?php

namespace App\Http\Controllers;
use App\Patient_details;
use App\Patient;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Managers\PatientManager;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patient = PatientManager::getPatientData();
        $patientDetails = PatientManager::getPatientCheckupDetails();
        // $count = DB::table('patient')->select('COUNT('medicare_no')')->get();
        $count = Patient::count();
        $count_details = Patient_details::count();
        $count_doctor = User::count();
        $todays_appointment_count = Patient_details::where('nextAppointment','=',date("Y-m-d"))->count();

        return view('home',compact('patientDetails',$patientDetails))->with('patient',$patient)->with('count',$count)->with('count_details',$count_details)->with('count_doctor',$count_doctor)->with('todays_appointment_count',$todays_appointment_count);
    }
}
