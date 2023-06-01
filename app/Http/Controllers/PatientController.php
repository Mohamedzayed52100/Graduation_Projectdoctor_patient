<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PatientController extends Controller
{
    //now it's 6:02 at 8/2 Coding wiht Zayed



    public function welcome()
    {
        return view('patient_pages.welcome');
    }

    public function settingsPatient()
    {
        return view('patient_pages.settings_Patient');
    }
    public function HomePatient()
    {
        return view('patient_pages.home_patient');
    }
    public function Patientprofile()
    {

        // return session('patient_login')->birth_of_date;



        ///Auth::user()


        $data =DB::table('doctor')->join('doctor-patient' , 'doctor-patient.doctor_id' , 'doctor.doctor_id')->where('doctor-patient.MRN' , session('id'))->get();

       // return $data;

        $doctor_for_patient = DB::table('doctor-patient')->where('MRN', session('id'))->first();

        // return $doctor_for_patient;

        $doctr=DB::table('doctor')->where('doctor_id', $doctor_for_patient->doctor_id)->first();
        //  return $doctr;


        $Diabetesval =70;
        $coronaryheartdiseaseval =90;
        $Chronickidneydiseaseval =80;

        $Lastvisit="Good";
        $Lastmonth="stable";
        $lastyear="stable";



        $patient_image=DB::table('patient')->where('MRN', session('id'))->pluck('patient_image')->first();
        //return $patient_image;
        //   return $doctor_for_patient;

        return view('patient_pages.patient_profile', get_defined_vars());// , compact('doctor_for_patient'));
    }
    public function choose_disease()
    {
        $disease_data = DB::table('disease')->get();

        return view('patient_pages.choose_disease', compact('disease_data'));
    }
    public function PatientRequestLab()
    {
        return view('patient_pages.patient_request');
    }
    public function relative_list_patient()
    {
        return view('patient_pages.relative_list_patient');
    }
    public function vitalSigns($type=5)
    {



        return view('patient_pages.vital_signs');




    }
    public function patient_reports()
    {


        
    //for Pie
    $unstable=DB::table('patient-vital-sign')->where([
        ['report' , 'unstable'] , 
         ['doctor_id' , session('id')],
    ])->count();
        $stable=DB::table('patient-vital-sign')->where([
            ['report' , 'stable'] , 
             ['doctor_id' , session('id')],
        ])->count();
        $emergency=DB::table('patient-vital-sign')->where([
            ['report' , 'emergency'] , 
             ['MRN' , session('id')],
        ])->count();
    


        //for sensor data

        $readings =     DB::table('sensordata')->where([
            ['heart' , '<>' , -999 ] , 
            ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('created_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'heart', 'oxygen');
       foreach ($readings as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->created_at));
           $heart = intval($reading->heart);
           $oxygen = intval($reading->oxygen);
           $chartData[] = array($date, $heart, $oxygen);
       }

       $chartDataJson = json_encode($chartData);


       ///for pressure
        $readings2 =     DB::table('patient-vital-sign')->where([
            ['MRN' , '=' , session('id') ] , 
            // ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('recorded_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'systolic', 'diastolic');
       foreach ($readings2 as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->recorded_at));
           $systolic = intval($reading->systolic);
           $diastolic = intval($reading->diastolic);
           $chartData[] = array($date, $systolic, $diastolic);
       }

       $chartDataJson2 = json_encode($chartData);
        //return $emergency . ' '. $stable .' ' .$unstable;
        


        ///line chart


        $readings3 =     DB::table('patient-vital-sign')->where([
            ['MRN' , '=' , session('id') ] , 
            // ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('recorded_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'glucose');
       foreach ($readings3 as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->recorded_at));
           $glucose = intval($reading->glucose);
        //    $diastolic = intval($reading->diastolic);
           $chartData[] = array($date, $glucose);
       }

       $chartDataJson3= json_encode($chartData);

        return view('patient_pages.patient_reports' , get_defined_vars());
    }
    public function PatientLogin()
    {
        return view('patient_pages.patient_login');
    }
    public function PatientResult()
    {
        return view('patient_pages.resultmeasurements');
        return view('patient_pages.result');
    }
    public function chat_patient()
    {
        return view('patient_pages.chat');
    }
    public function PatientLogout()
    {
        /// return view('patient_pages.patient_login');


        /*
       zayed Don't forget this is body of log out function Session is expired
       */


        return "Log Out";
    }



    public function login_submit_p(Request $request)
    {
        // $data=DB::table('patient')->where(['email' => $request->email , 'password' =>$request->password])->first();
        // if($data){
        //     return redirect('/HomePatient');

        // }
        // else {
        //     return back()->withInput();

        // }
        ////  return $request->all();


        $data = DB::table('patient')->where(['email' => $request->email, 'password' => $request->password])->first();



        if ($data) {

            ///  return dd($data);
            session([
                'id' => $data->MRN,
                'patient_login' => $data,

            ]);

            return redirect('/welcome');
        } else {
            return redirect('/PatientLogin')->withInput();
        }
    }
    public function Edit_patient_data(Request $request)
    {


        return;


        return $request->all();

        $id = session('id');



        $patient = Patient::find($id);


        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $patient->patient_image  = $imageName;
        $patient->password  = $request->newpassword1;





        // if ($request->has('file')) {
        //     $image = $request->file('file');
        //     $imageName = time() . '.' . $image->extension();
        //     $image->move(public_path('images'), $imageName);
        //     $patient->patient_image  = $imageName;
        // }


        // $id = session('patient_id_login');
        // DB::table('patient')->where('id', $id)->update([
        //     'name' => $request->name,


        // ]);
    }





    public function vitalSigns_submit(Request $request)
    {

        $request->validate([
            'pressure' => 'required|numeric',
            'heart_rate' => 'required|numeric',
            'oxygen_rate' => 'required|numeric',

            'glucose' => 'required|numeric',
            'report' => 'required|string',
        ]);
        //  return dd($request->all());


        $current_date = date("Y-m-d H:i:s");
        DB::table('patient-vital-sign')->insert([
            'MRN' =>$request->id,
            'pressure' =>$request->pressure,
            'heart_rate' =>$request->heart_rate,
            'oxygen_rate' =>$request->oxygen_rate,
            'glucose' =>$request->glucose,
            'report' =>$request->report,

            'date'=>$current_date,

        ]);
        return back();



    }



    public function HomePatient_privide_advices()
    {
        ////this function will include all advices for the system

        ///General Advices

        ///Diabetes


        ///Coronary heart disease



        ////Chronic kidney disease





    }

    public function Patient_charts()
    {
        $symptom_data = DB::table('patient-symptom')->where('patient_id', session('patient_login'))->latest();
        $sensors_data = DB::table('patient-vital-sign')->where('patient_id', session('patient_login'))->latest();
    }



    public function PatientRequestLab_submit(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'address'=>'required',
            'labtest'=>'required',
            'date'=>'required',
            'take'=>'required',
            'payment'=>'required',


        ]);

        ///if($request->has("payment"));

        // return DB::table('lab-appointment')->insert([
        //     'due_date'=>$request->date,

        // ]);

        return $request->all();
    }


    public function change_g_info(Request $request)
    {

        //dd($request->all());

        $id =session('id');

        // DB::table('patient')->where('MRN' , session('id'))->update([
        //     'name'=>$request->name ,
        //     'email'=>$request->name ,
        //     'name'=>$request->name ,
        // ]);


        $patient = Patient::where('MRN', $id)->first();
        ///  $name=$request->name;
        $image=$request->file('file');
        $imageName=time(). '.' .$image->extension();
        $image->move(public_path('images'), $imageName);

        // $request->file=$imageName;




        $patient->phone  = $request->phone;
        $patient->name  = $request->name;
        $patient->email  = $request->email;
        $patient->patient_image  = $imageName;
        $patient->save();
        // DB::table('patient')->where('MRN', $id)->update([
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'name' => $request->name,
        //     'patient_image'  => $imageName,


        // ]);
        $data =DB::table('patient')->where('MRN', $id)->first();
        session([
         'patient_login' => $data,
        ]);

        return back()->with('change_g_info', "general information has been updated");
    }

    public function change_site_control(Request $request)
    {

        //return $request->all();
        $request->validate([
            'oldpassword' => 'required',
            'newpassword1' => 'required|min:9 |max:20',
            'newpassword2' => 'required|min:9 |max:20',

        ]);

        $old_password=DB::table('patient')->where('MRN', session('id'))->pluck('password')->first();
        // return $oldpassord;

        if($old_password  != $request->oldpassword) {
            return back();
        }


        if ($request->newpassword1 != $request->newpassword2) {
            return back()->with('no_match_password', 'new Password Field not matched');
        }


        DB::table('patient')->where('MRN', session('id'))->update([
            'password' => $request->newpassword1,
        ]);
        return back()->with('password_ok', 'Password has been updated successfully');

    }


    public function relativesOperation()
    {

        $patient_id =session('id');

        $data =DB::table('relative-patient')->where('MRN', session('id'))->get();


        $data_fo_relatives =DB::table('relative')->join('relative-patient', 'relative.relative_id', '=', 'relative-patient.relative_id')
        ->where('relative-patient.MRN', $patient_id)
        ->get(['relative.name' ,'relative-patient.MRN'  ,
         'relative-patient.relatively_degree' ,
         'relative.email' ,
         'relative.phone' ,
         'relative.relative_id' ,
         'relative.relative_img' ,


        ]);

        // return $data_fo_relatives;
        return view('patient_pages.relative_list_patient', get_defined_vars());






    }
    public function autocomplete(Request $request){
        $result= DB::table('disease_test')->select('test_name')
        ->where('test_name','LIKE',"%{$request->input('query')}%")
        ->get();
        $dataModified = array();
        foreach ($result as $data)
        {
          $dataModified[] = $data->test_name;
        }
   
        return response()->json($dataModified);
    }


    public function removeRelative($id)
    {
        // return $id;

        DB::table('relative')->where('relative_id', $id)->delete();
        return back();

    }


    public function gettest()
    {
        return view('patient_pages.test');
    }
    public function posttest(Request $request)
    {

        $name=$request->name;
        $image=$request->file('file');
        $imageName=time(). '.' .$image->extension();
        $image->move(public_path('images'), $imageName);
        return "done";
    }



 



public function TestCase(){

    //for Pie
    $unstable=DB::table('patient-vital-sign')->where([
        ['report' , 'unstable'] , 
         ['doctor_id' , session('id')],
    ])->count();
        $stable=DB::table('patient-vital-sign')->where([
            ['report' , 'stable'] , 
             ['doctor_id' , session('id')],
        ])->count();
        $emergency=DB::table('patient-vital-sign')->where([
            ['report' , 'emergency'] , 
             ['MRN' , session('id')],
        ])->count();
    


        //for sensor data

        $readings =     DB::table('sensordata')->where([
            ['heart' , '<>' , -999 ] , 
            ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('created_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'heart', 'oxygen');
       foreach ($readings as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->created_at));
           $heart = intval($reading->heart);
           $oxygen = intval($reading->oxygen);
           $chartData[] = array($date, $heart, $oxygen);
       }

       $chartDataJson = json_encode($chartData);


       ///for pressure
        $readings2 =     DB::table('patient-vital-sign')->where([
            ['MRN' , '=' , session('id') ] , 
            // ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('recorded_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'systolic', 'diastolic');
       foreach ($readings2 as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->recorded_at));
           $systolic = intval($reading->systolic);
           $diastolic = intval($reading->diastolic);
           $chartData[] = array($date, $systolic, $diastolic);
       }

       $chartDataJson2 = json_encode($chartData);
        //return $emergency . ' '. $stable .' ' .$unstable;
        


        ///line chart


        $readings3 =     DB::table('patient-vital-sign')->where([
            ['MRN' , '=' , session('id') ] , 
            // ['oxygen' , '<>' , -999 ] , 
           ])->orderBy('recorded_at', 'asc')
           ->get();

       // Format the data for a Google Chart
       $chartData = array();
       $chartData[] = array('Date', 'glucose');
       foreach ($readings3 as $reading) {
           $date = date('Y-m-d H:i:s', strtotime($reading->recorded_at));
           $glucose = intval($reading->glucose);
        //    $diastolic = intval($reading->diastolic);
           $chartData[] = array($date, $glucose);
       }

       $chartDataJson3= json_encode($chartData);

      
          return view('testzoom', get_defined_vars());
        
    }

    public function zoomMeetingpatient(){

        $zoomdata=DB::table('zoom')->where('start_at' , '>=' , now())->get();

        $zoomdata=   DB::table('zoom')
       ->join('zoompatient' , 'zoompatient.zoom_id' , 'zoom.primary_id' )
        
       ->where([
            ['start_at' , '>=' , now()], 
            ['zoompatient.patient_id' , session('id')],
        ])->get();
     //   return $zoomdata;
        return view('patient_pages.zoommeeting' , get_defined_vars());
    }

}
