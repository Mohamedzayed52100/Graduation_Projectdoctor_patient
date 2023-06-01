<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class DoctorController extends Controller
{

    public $lop=true;

    public function HomeDoctor()
    {







   //  return 

        /*
        Div 3 today pupil
        */

        // $unstable_count = DB::table('patient')
        //     ->join('doctor-patient', 'patient.MRN', '=', 'doctor-patient.MRN')
        //     ->where('doctor_id', session('doctorid') )->where('status', 'unstable')->count();
        // $stable_count = DB::table('patient')
        //     ->join('doctor-patient', 'patient.MRN', '=', 'doctor-patient.MRN')
        //     ->where('doctor_id',  session('doctorid'))->where('status', 'stable')->count();
        // $emergancy_count = DB::table('patient')
        //     ->join('doctor-patient', 'patient.MRN', '=', 'doctor-patient.MRN')
        //     ->where('doctor_id',  session('doctorid'))->where('status', 'emergency')->count();

        ///////new counting 

        
        $oneDayAgo = now()->subDay(); //take first 10
        $oneWeekAgo = now()->subWeek(); //take first 10

    

        $today = \Carbon\Carbon::today();
        // $dataTodaystable = DB::table('patient-vital-sign')
        //                 ->whereDate('recorded_at', '=', $today)
        //                 ->where('report' , 'stable')
        //                 ->where('doctor_id' , session('doctorid'))->distinct()->count('MRN');


        $unstable_count =DB::table('patient-vital-sign')->where([
            ['report' , 'unstable'] , 
            // ['recorded_at', '>=', $oneDayAgo ],
            ['doctor_id' , session('doctorid')],
        ])
        ->whereDate('recorded_at', '=', $today)
        ->select('MRN')->distinct()->count();;

        // $unstable_count=DB::table('patient-vital-sign')
        // ->join('doctor-patient' , 'doctor-patient.doctor_id' , session('doctorid'))
        // ->where([
        //     ['patient-vital-sign.report' , 'stable'] , 
        //     ['patient-vital-sign.recorded_at', '>=', $oneDayAgo ],
        // ]);
        // return $unstable_count;
        $stable_count =DB::table('patient-vital-sign')->where([
            ['report' , 'stable'] , 
            ['recorded_at', '>=', $oneDayAgo ],
            ['doctor_id' , session('doctorid')],
        ])->distinct()->count('MRN');;
        $emergancy_count =DB::table('patient-vital-sign')->where([
            ['report' , 'emergency'] , 
            // ['recorded_at', '>=', $oneDayAgo ],
            ['doctor_id' , session('doctorid')],

            

        ])
        ->whereDate('recorded_at', '=', $today)
        
        ->distinct()->count('MRN');;
        // return $data;

        //return $stable_count;
        // return $unstable_count;
        //  return $emergancy_count;



      /*
      9     
      
      */


    //   $yesterdaycountstable= DB::table('patient-vital-sign')->where([
    //     ['recorded_at', '>=' ,$oneDayAgo],
    //     ['report' , '=' , 'stable'], 
    //     ['doctor_id' , session('doctorid')],
    //   ])->count();
    //   $yesterdaycountunstable= DB::table('patient-vital-sign')->where([
    //     ['recorded_at', '>=' ,$oneDayAgo],
    //     ['report' , '=' , 'unstable'], 
    //     ['doctor_id' , session('doctorid')],
    //   ])->count();
    //   $yesterdaycountemergency= DB::table('patient-vital-sign')->where([
    //     ['recorded_at', '>=' ,$oneDayAgo],
    //     ['report' , '=' , 'emergency'] , 
    //     ['doctor_id' , session('doctorid')],
    //   ])->count();



    //distinct()->count('column_name');
 
      $today = \Carbon\Carbon::today();
      $dataTodaystable = DB::table('patient-vital-sign')
                      ->whereDate('recorded_at', '=', $today)
                      ->where('report' , 'stable')
                      ->where('doctor_id' , session('doctorid'))->distinct()->count('MRN');

       // return $dataTodaystable;
      $dataTodayunstable = DB::table('patient-vital-sign')
                      ->whereDate('recorded_at', '=', $today)
                      ->where('report' , 'unstable')
                      ->where('doctor_id' , session('doctorid'))
                      ->distinct()->count('MRN');
      $dataTodayemergency= DB::table('patient-vital-sign')
                      ->whereDate('recorded_at', '=', $today)
                      ->where('report' , 'emergency')
                      ->where('doctor_id' , session('doctorid'))

                      ->distinct()->count('MRN');

                      $lastWeekStart = \Carbon\Carbon::now()->subWeek()->startOfWeek();
                      $lastWeekEnd = \Carbon\Carbon::now()->subWeek()->endOfWeek();
                      $dataLastWeekstable = DB::table('patient-vital-sign')
                                          ->whereBetween('recorded_at', [$lastWeekStart, $lastWeekEnd])
                                          ->where('report' , 'stable')
                                          ->where('doctor_id' , session('doctorid'))

                                          ->distinct()->count('MRN');
                      $dataLastWeekunstable= DB::table('patient-vital-sign')
                                          ->whereBetween('recorded_at', [$lastWeekStart, $lastWeekEnd])
                                          ->where('report' , 'unstable')
                                          ->where('doctor_id' , session('doctorid'))

                                          ->distinct()->count('MRN');
                      $dataLastWeekemergency = DB::table('patient-vital-sign')
                                          ->whereBetween('recorded_at', [$lastWeekStart, $lastWeekEnd])
                                          ->where('report' , 'emergency')
                                          ->where('doctor_id' , session('doctorid'))

                                          ->distinct()->count('MRN');

                            

                     $yesterday = \Carbon\Carbon::yesterday();    
                     $dataYesterdaystable = DB::table('patient-vital-sign')
                                                              ->whereDate('recorded_at', '=', $yesterday)
                                                              ->where('report' , 'stable')
                                                              ->where('doctor_id' , session('doctorid'))


                                                              ->distinct()->count('MRN');
                     $dataYesterdayunstable = DB::table('patient-vital-sign')
                                                              ->whereDate('recorded_at', '=', $yesterday)
                                                              ->where('report' , 'unstable')
                                                              ->where('doctor_id' , session('doctorid'))


                                                              ->distinct()->count('MRN');
                     $dataYesterdayemergency = DB::table('patient-vital-sign')
                                                              ->whereDate('recorded_at', '=', $yesterday)
                                                              ->where('report' , 'emergency')
                                                              ->where('doctor_id' , session('doctorid'))


                                                              ->distinct()->count('MRN');

   /*   return $dataTodaystable . ' '.$dataTodayunstable . ' '.$dataTodayemergency .'<br>' 
       .$dataLastWeekstable . ' ' . $dataLastWeekunstable . ' ' .$dataLastWeekemergency .'<br>' 
       . $dataYesterdaystable .' '.$dataYesterdayunstable .' '.$dataYesterdayemergency;*/








        $table_show_unstable = DB::table('patient')
            ->join('patient-disease', 'patient.MRN', '=', 'patient-disease.MRN')
            ->join('disease', 'disease.disease_id', 'patient-disease.disease_id')
            ->join('patient-vital-sign' , 'patient-vital-sign.MRN' , 'patient.MRN')
            ->where('patient-disease.doctor_id',  session('doctorid'))
            ->whereDate('recorded_at', '=', $today)
            ->where('patient-vital-sign.report', 'unstable')->distinct()->get();
            

            // $table_show_stable = DB::table('patient')
            // ->join('patient-disease', 'patient.MRN', '=', 'patient-disease.MRN')
            // ->join('disease', 'disease.disease_id', 'patient-disease.disease_id')
            // ->join('patient-vital-sign' , 'patient-vital-sign.MRN' , 'patient.MRN')
            // ->where('patient-disease.doctor_id',  session('doctorid'))
            // ->whereDate('recorded_at', '=', $today)
            // ->where('patient-vital-sign.report', 'stable')->get();

            // $table_show_emergency = DB::table('patient')
            // ->join('patient-disease', 'patient.MRN', '=', 'patient-disease.MRN')
            // ->join('disease', 'disease.disease_id', 'patient-disease.disease_id')
            // ->join('patient-vital-sign' , 'patient-vital-sign.MRN' , 'patient.MRN')
           
            // ->where('patient-disease.doctor_id',  session('doctorid'))
            // ->whereDate('recorded_at', '=', $today)
            // ->where('patient-vital-sign.report', 'emergency')->get();
          // return $table_show_emergency;

            //->paginate(5); //->pluck('patient.name' , 'disease.name'   );
        // ->join('doctor-patient' ,'doctor-patient.doctor_id' , '=' , )->get() ;
        /// return $table_show;

        $yesterday = DB::table('casepatients')
        ->whereDate('created_at', today()->subDay())
        ->selectRaw('SUM(stable) as stable, SUM(unstable) as unstable, SUM(emergency) as emergency')
        ->first();

    $lastWeek = DB::table('casepatients')
        ->whereBetween('created_at', [today()->subWeek(), today()->subDay()])
        ->selectRaw('SUM(stable) as stable, SUM(unstable) as unstable, SUM(emergency) as emergency')
        ->first();

    $today = DB::table('casepatients')
        ->whereDate('created_at', today())
        ->selectRaw('SUM(stable) as stable, SUM(unstable) as unstable, SUM(emergency) as emergency')
        ->first();



        return view('doctor_pages.HomeDoctor', get_defined_vars());
 
    }


    public function medicalrecord_Doctor($id)
    {
        //return $id;





        /*
        
        Auth::user()
        
        */
       // return DB::table('patient-vital-sign')->where('MRN' , $id)->orderBy('date' ,'desc')->first();



        $data = DB::table('patient')
            ->join('patient-vital-sign', 'patient.MRN', '=', 'patient-vital-sign.MRN')
            //->join('patient-disease', 'patient.MRN', '=', 'patient-vital-sign.MRN')

            ->where('patient.MRN' , $id)->orderBy('date' ,'desc')->first();

          // return $data;

        $patient_age = Carbon::parse($data->birth_of_date)->age;
        // return $patient_age;

        ///return $data;

        $dataforhealthstatus = DB::table('patient')
       // ->join('patient-vital-sign', 'patient.MRN', '=', 'patient-vital-sign.MRN')
        ->join('patient-disease', 'patient.MRN', '=', 'patient-disease.MRN')

        ->where('patient.MRN', $id)->first();

       // return $dataforhealthstatus;



       $data_complaint =  DB::table('patient_complaint')->where('MRN', $id)->orderBy('created_at', 'desc')->first(); //modern
      // $data_complaint =  DB::table('patient_complaint')->where('MRN', $id)->orderBy('created_at', 'asc')->first(); //old

       //return $data_complaint;


           // Retrieve data from the blood_pressure table


           /*
           
             DB::table('sensordata')->where([
            ['heart' , '<>' , -999 ] , 
            ['oxygen' , '<>' , -999 ] ,
            
        ])->get();
           
           */
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


       $patient_id=$id;
      // return $patient_id;


        return view('doctor_pages.medicalrecord_Doctor', get_defined_vars());
    }
    public function medicalrecord_Doctor_submit(Request $request)
    {

       /// dd($request->all());

      $request->validate([
        'newnotes'=>'required',
      ]);


      DB::table('patient_complaint')->where('MRN' , $request->patient_id)->update([
        'notes'=>$request->newnotes,
      ]);
      return back()->with('newnotes'  , 'Your notes has been submitted');

    $data_complaint =  DB::table('patient_complaint')->where('MRN', $request->patient_id)->orderBy('created_at', 'desc')->first();
       DB::table('patient_complaint')->where('id' ,$data_complaint->id )->update([
        'notes'=>$request->newnotes,
       ]);



     

        return  $data_complaint;


       $patient=  Patient::where('MRN', $request->patient_id)->orderBy('created_at', 'desc')->first();

       $patient->notes =$request->newnotes;

       $patient->save();
       return back();








        DB::table('patient_complaint')->where('MRN' , $request->patient_id)->update([

            'notes'=>$request->newnotes,



        ]);
        dd($request->all());
    }


    public function patientListDoctor(Request $request)
    {

        /// return Patient::all();
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // return Patient::all();

        return view('doctor_pages.patientListDoctor');
    }



    public function emergencyList( )
    {

        $today = \Carbon\Carbon::today();


    //    return $today;
        

      ///  return DB::table('patient-vital-sign')->select('MRN')->distinct()->get();
  

        $data = DB::table('patient')
        ->join('patient-vital-sign' , 'patient.MRN' , 'patient-vital-sign.MRN')
        // ->join('relative-patient' , 'relative-patient.MRN' , 'patient.MRN')
        // ->join('relative' , 'relative-patient.relative_id'  ,'relative.relative_id') 
        ->where('patient-vital-sign.report' ,'emergency')   
        ->whereDate('recorded_at', '=', $today)
        ->where('patient-vital-sign.doctor_id' , session('doctorid')) 
        ->pluck('patient-vital-sign.MRN')->toArray();





    
     

        $numbers = collect($data);
        $uniqueNumbers = $numbers->unique()->values()->all();
       // return $uniqueNumbers;

      // return $data;
     $final_res =    DB::table('patient')
     ->join('patient-disease' ,'patient.MRN', 'patient-disease.MRN')
     ->join('disease' ,'patient-disease.disease_id', 'disease.disease_id')
//   ->join('relative-patient' , 'relative-patient.MRN' , 'patient.MRN')
//         ->join('relative' , 'relative-patient.relative_id'  ,'relative.relative_id') 
             ->whereIn('patient.MRN'  , $uniqueNumbers)->get();


             

      // return $final_res;
        // return DB::table('patient')
        // ->join('patient-vital-sign' , 'patient.MRN'  , 'patient-vital-sign.MRN')->distinct()->count();
       

        //it's 4:42 am
        $data= Patient::where('status' , 'emergency')->get();
         // return $data;
        $data = DB::table('patient')
      // ->join('doctor-patient' , 'doctor-patient.MRN', '=','patient.MRN' )
        ->join('patient-vital-sign', 'patient.MRN', '=', 'patient-vital-sign.MRN')
        ->join('relative-patient'  ,'patient.MRN'  , '=' , 'relative-patient.MRN' )
        ->join('patient-disease' , 'patient.MRN'  , '=' , 'patient-disease.MRN')
        ->join('doctor-patient' , 'patient.MRN', '=', 'doctor-patient.MRN' )

       // ->join('doctor' , 'doctor_id'  , '=' , 1)
        ->where([
            // ['patient.status' ,'=', 'emergency'] ,
            ['patient-vital-sign.report'  ,  "emergency"],
            ['doctor-patient.doctor_id' , '=' ,  session('doctorid')],
        ])->distinct()->count();
        //return $data;
       return view('doctor_pages.emergencyList' , get_defined_vars());

    }
    public function DoctorProfile(){

        $doctor =Doctor::where('doctor_id', session('doctorid'))->first();

        $paient_count =DB::table('doctor-patient')->where('doctor_id', session('doctorid'))->count();

       // return  $doctor;


// return  date('Y-m-d H:i:s' );







//date('Y' )
        $num_of_exper= Carbon::parse($doctor->start_work)->age ;

      //  return $num_of_exper;



        return view('doctor_pages.DoctorProfile' , get_defined_vars());

    }



    public function changeDoctoPassword(Request $request){
        $request->validate([
            'old'=>'required' ,
            'password' => 'required',
            'password_comfirmation' => 'required',

        ]);

        DB::table('doctor')->where('doctor_id'  , $request->doctor_id)->update([
            'password'=>$request->password,

        ]);
        return back()->with('password_updated'  , 'Password has be been updated');



        return $request->all();
    }


    public function editDoctorPersonalInfo(Request $request) {
        // DB::table('doctor')->where('doctor_id', $request->doctor_id)->update([
        //     'name'=>'Ahmed Elsadany',
        // ]);

        // return $request->all();


        DB::table('doctor')->where('doctor_id', $request->doctor_id)->update([
            'name'=> $request->name,
            'speciality'=>$request->speciality,
            'date_of_birthday'=>$request->date_of_birthday,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'country'=>$request->country,
            // 'speciality'=>$request->speciality,
        ]);


        return back()->with('Docor_personal_info' , 'Doctor Personal Information Has benn Updated');

       /// return $request->name;

        return DB::table('doctor')->where('doctor_id', $request->doctor_id)->first();



        return var_dump($request->doctor_id);


        $id =$request->id;

        return DB::table('doctor')->where('doctor_id', $id)->first();
        return Doctor::all();

        return DB::table('doctor')->where('doctor_id', $request->doctor_id)->get();

        $doctor=Doctor::where('doctor_id', $request->doctor_id)->get();
        return $doctor;

    }
    public function lockscreensubmit(Request $request){

        $request->validate([
            'password'=>'required',
        ]);


        $data=  DB::table('doctor')->where('doctor_id', $request->doctor_id)->where('password'  , $request->password)->first();

        if($data){
            return redirect('DoctorProfile');
        }
        else return back()->with('invaild_password'  , 'invaild passowrd ');

        return $request->all();

    }


    public function removepatientBydoctor($id){
        return $id;

    }



    public function zoomDoctor(){

        $patientdata =DB::table('patient')
        ->join('doctor-patient', 'patient.MRN', 'doctor-patient.MRN')
        ->where('doctor-patient.doctor_id' , session('doctorid'))
        ->get();
        
       // return $patientdata;

        return view('doctor_pages.zoomDoctor' , get_defined_vars());
    }
}
