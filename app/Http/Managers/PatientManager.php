<?php
namespace App\Http\Managers;

use Illuminate\Http\Request;
use App\Patient;
use App\Patient_details;
use DB;
use File;
use Illuminate\Validation\Validator;

class PatientManager
{

          public static function setPatientData(Request $request)
            {

              // Vadilate a form data
              $request->validate([
                          'medicare_no' => 'required|unique:patients|max:255',
                          'patientName' => 'required',
                          'email' => 'required|email',
                          'contact' => 'required',
                          'registerBy' => 'required',
                            ]);
              $patient = new Patient;
              $patient->medicare_no = $request->input('medicare_no');
              $patient->name = $request->input('patientName');
              $patient->email = $request->input('email');
              $patient->contact = $request->input('contact');
              $patient->registerBy  = $request->input('registerBy');


              // create a folder of name medicare no if file no exists
              if(!file_exists("/public/Uploads/patients/".$patient->medicare_no)){
                  File::makeDirectory(base_path("/public/Uploads/patients/".$patient->medicare_no), 0777, true);
                }

              // save data into database
                    return $patient->save();

            }

            public static function setPatientCheckupDetails(Request $request)
              {

                date_default_timezone_set("Asia/Kolkata");
                $date = date("Y-m-d H-m-s");
                $date = str_replace(" ","_",$date);
                $appointment_date = date("Y-m-d");
                $appointment_date = date('Y-m-d', strtotime($appointment_date .' +7 day'));
                $patient = new Patient_details;
                $patient->name = $request->input('name');
                $patient->details = $request->input('details');
                $patient->doctor_name = $request->input('doctor_name');
                $patient->medicare_no = $request->input('medicare_no');
                $patient->report_file_path = 'Uploads/patients/'.$patient->medicare_no.'/'.'('.$date.')'.$patient->name.'.docx';
                $patient->nextAppointment = $appointment_date;

                $phpWord = new \PhpOffice\PhpWord\PhpWord();

                $section = $phpWord->addSection();
                $section->addText('Report',
                          array('name'=>'Times New Roman', 'size'=>20, 'bold'=>true,'alignment' => 'center'));
                $section->addText($patient->name,
                          array('name'=>'Times New Roman', 'size'=>20, 'bold'=>true));
                $section->addText($patient->medicare_no,
                          array('name'=>'Times New Roman', 'size'=>20, 'bold'=>true));
                $section->addText(  $patient->details,
                          array('name'=>'Times New Roman', 'size'=>16,'align'=>"center"));
                $section->addText('Attend By : '.$patient->doctor_name,
                          array('name'=>'Times New Roman', 'size'=>16, 'bold'=>true,'align'=>"center"));

                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
                $objWriter->save($patient->report_file_path);

                $patient->save();

              }


              public static function getPatientData()
                {
                  return $data = DB::table('patients')
                           ->select('name','medicare_no')
                           ->get();

                }

              public static function getPatientCheckupDetails(){

                  // $patient variable fetch data from DB and stores medicare no
                  return $data = DB::table('patient_details')
                                  ->get();
              }

}
