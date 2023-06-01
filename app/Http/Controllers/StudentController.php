<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getStudents(Request $request)
    {


        /*

               $actionBtn = '<a href="/removepatientBydoctor/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
        */
        if ($request->ajax()) {

            // $data = Patient::latest()->get();
            $data = DB::table('patient')
                ->join('doctor-patient', 'patient.MRN', '=', 'doctor-patient.MRN')
                ->where([
                    ['doctor-patient.doctor_id', '=', session('doctorid')],
                ])
                ->get();

                return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {

                    $actionBtn = '<a  href="/medicalrecord_Doctor/' . $row->MRN . ' " class="delete btn btn-success btn-sm bg-red"  >Show Record</a>';
                    //success
                    // $actionBtn = '<a  href="/medicalrecord_Doctor/' . $row->MRN . ' " class="delete btn btn-success btn-sm"  >Show Record</a>';
                    // $actionBtn = '<a href="/removepatientBydoctor/'.$row->MRN.'" class="delete btn btn-danger btn-sm">show</a>';
                    // $actionBtn = '<a href="/removepatientBydoctor/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function justTest()
    {



      return  \Carbon\Carbon::today();



      $data=  DB::table('casepatients')->where('id' , 1)->first();
      $up= $data->stable;
      $up+=1;
     // return $up;
      DB::table('casepatients')->where('id' , 1)->update([
        'stable'=>$up,
      ]);

        //return now();

        return DB::table('patient_complaint')->where('MRN', session('id'))->latest()->first();
        $oneDayAgo = now()->subDay();

        $data = DB::table('sensordata')
            ->select('oxygen', 'heart', 'patient_id', 'id')
            ->where([
                ['created_at', '>=', $oneDayAgo],
                ['patient_id', '=', session('id')],

            ])
            ->get();


        return $data;


        for ($i = 0; $i < 10; $i++) {
            DB::table('sensordata')->insert([
                'patient_id' => session('id'),
                'oxygen' => random_int(80, 150),
                'heart' => random_int(80, 150),

            ]);

        }
        return "done";

        //     $oneHourAgo = now()->subHour();

        //    $data = DB::table('my_table')
        //         ->select('column1', 'column2', 'column3')
        //         ->where('created_at', '>=', $oneHourAgo)
        //         ->get();



        return view('patient_pages.test');

        session([
            'namealaa' => 'alaa ibrahim',
            'agealaa' => 22,
        ]);

        return date('Y');
        return Carbon::parse(date('Y-m-d H:i:s'))->age;
        return date('Y-m-d H:i:s');

        $data = DB::table('patient')
            ->join('doctor-patient', 'patient.MRN', '=', 'doctor-patient.MRN')
            ->where([
                ['doctor-patient.doctor_id', '=', session('doctorid')],
            ])
            ->get();
        return $data;

        return Patient::latest()->get();
    }

    public function heart_Rate_Condition($sensor_data, $normal1, $normal2, $max)
    {

        $counter1 = 0;
        $counter2 = 0;

        $heart_Result = "normal";

        foreach ($sensor_data as $key => $value) {


            if ($value->heart >= $normal1 and $value->heart <= $normal2) {
                $counter1 = 0;
                $counter2 = 0;

            } else if ($value->heart >= $normal2 and $value->heart <= $max) {
                $counter1++;
                if ($counter1 == 5) {
                    $heart_Result = "unstable";


                }
            } else {
                $counter2++;
                if ($counter2 == 5) {
                    $heart_Result = "emergency";
                    break;



                }


                /// 3  u 3 e  4 n

            }

        }

        return $heart_Result;

        // return $id .' '.$data;

    }


    public function oxygen_Condition($sensor_data)
    {

        $counter1 = 0;
        $counter2 = 0;
        $oxygen_Result = "normal";




        foreach ($sensor_data as $key => $value) {
 


              if ($value->oxygen >= 91 and $value->oxygen <= 100) {
                $counter1 = 0;
                $counter2 = 0;

            } else if ($value->oxygen >= 85 and $value->oxygen <= 90) {
                $counter1++;
                if ($counter1 == 5) {
                    $oxygen_Result = "unstable";


                }
            } else {
                $counter2++;
                if ($counter2 == 5) {
                    $oxygen_Result = "emergency";
                    break;



                }


                /// 3  u 3 e  4 n

            }

        }
        return $oxygen_Result;


    }


    public function justTest2(Request $request)
    {


        // return $request->all();;






        //  return $this->R(1 , "alaa");


        $request->validate
        ([
                'systolic' => ['required', 'min:2', 'numeric'],
                'diastolic' => ['required', 'min:2', 'numeric'],
                'glucose' => ['required', 'min:2', 'numeric'],
            ]);




        $systolic = $request->systolic;
        $diastolic = $request->diastolic;
        $glucose = $request->glucose;
        $type_choose = $request->num;

        $systolic_Pressure_Result = "";
        $symptoms_Pressure_Result = "";
        $report_Result = "";
        $glucose_Result = "";
        $pressure_Result = "";
        $sensor_Result = "normal";
        $heart_Result = "normal";
        $oxygan_Result = "normal";







        $oneDayAgo = now()->subDay(); //take first 10

        $sensor_data = DB::table('sensordata')
            ->select('oxygen', 'heart', 'patient_id', 'id')
            ->where([
                //  ['created_at', '>=', $oneDayAgo ],
                ['patient_id', '=', session('id')],

            ])
            ->get();



        // return $sensor_data;







        $patient_data = DB::table('patient')->where('MRN', session('id'))->first();

        $patient_Age = Carbon::parse($patient_data->birth_of_date)->age;
        $doctor_id = DB::table('doctor-patient')->where('MRN'  , session('id'))->first();

        //return $doctor_id;

        $patient_complaint = DB::table('patient_complaint')->where('MRN', session('id'))->latest()->first();

        $counter1 = 0;
        $counter2 = 0;



        if ($patient_Age < 30) {

            $heart_Result = $this->heart_Rate_Condition($sensor_data, 100, 170, 200);


        } else if ($patient_Age < 40) {
            $heart_Result = $this->heart_Rate_Condition($sensor_data, 95, 162, 190);
        } else if ($patient_Age < 50) {
            $heart_Result = $this->heart_Rate_Condition($sensor_data, 90, 153, 180);
        } else if ($patient_Age < 60) {
            $heart_Result = $this->heart_Rate_Condition($sensor_data, 85, 145, 170);
        } else if ($patient_Age < 70) {
            $heart_Result = $this->heart_Rate_Condition($sensor_data, 80, 136, 160);
        } else {
            $heart_Result = $this->heart_Rate_Condition($sensor_data, 75, 128, 150);
        }

        $oxygan_Result = $this->oxygen_Condition($sensor_data);



        // foreach($sensor_data as $key => $value){


        //  if(($value->oxygen >=91 and 100 >=$value->oxygen  ) and ($value->heart   >=100  and  $value->heart<=120 ) ){
        //         $counter1=0;

        //     }
        //     else {
        //         $counter1++;
        //         if($counter1==5){
        //             $sensor_Result="emergency";
        //             break;

        //         }
        //     }

        // }
        //return $sensor_Result;






        //Just Pressure
        if ($systolic < 90 and $diastolic < 60) {
            $pressure_Result = "low";

        } else if ((90 <= $systolic and $systolic <= 120) and ($diastolic >= 60 and $diastolic <= 80)) {
            $pressure_Result = "normal";
        } else if (119 < $systolic and $systolic <= 129 and $diastolic < 80) {
            $pressure_Result = "elevated";

        } else if ((130 <= $systolic and $systolic <= 139) or ($diastolic >= 80 and $diastolic <= 89)) {
            $pressure_Result = "stage1";
        } else if ((140 <= $systolic and $systolic < 180) or ($diastolic >= 90 and $diastolic < 120)) {
            $pressure_Result = "stage2";
        } else if ((180 <= $systolic) and ($diastolic >= 120)) {
            $pressure_Result = "emergency";
        } else {
            $pressure_Result = "emergency";
        }





        ///glucose


        if ($type_choose == 1) {
            if ($glucose >= 90 and $glucose <= 162) {
                $glucose_Result = "normal";

            } else {
                $glucose_Result = "emergency";
            }
        } else if ($type_choose == 2) {
            if ($glucose >= 200) {
                $glucose_Result = "normal";

            } else {
                $glucose_Result = "emergency";
            }

        } else {
            if ($glucose >= 120 and $glucose <= 140) {
                $glucose_Result = "normal";

            } else {
                $glucose_Result = "emergency";
            }


        }





        if ($glucose_Result == 'emergency' or $pressure_Result == 'emergency' or $heart_Result == 'emergency' or $oxygan_Result == 'emergency') {
            $report_Result = 'emergency';
            //   $sensor_Result =='emergency';

        } else if ($glucose_Result == 'normal' and $pressure_Result == 'normal' and $heart_Result == 'normal' and $oxygan_Result == 'normal') {
            $report_Result = 'normal';
            //  $sensor_Result =='normal';

        }
        //         else  if($glucose_Result == 'emergency'  or  $pressure_Result =='emergency'  or $heart_Result =='emergency' or $oxygan_Result == 'emergency' ){
// {
//     $report_Result='emergency';
// }
        else {
            $report_Result = 'unstable';
            //  $sensor_Result =='unstable';
        }




        $checkboxValuesString=null;
     $effects=null;

if($request->has('symptoms')) {


    $checkboxValues = $request->input('symptoms');
    $checkboxValuesString = implode(',', $checkboxValues);

}
if($request->has('effects')) {

    $effectsval = $request->input('effects');
    $effects = implode(',', $effectsval);

}


// if( $checkboxValuesString==null and $effects==null)

// return "null";
// else 
// return "not null";
// return     $checkboxValuesString . ' ' .$effects;
 


        session([
            'systolic' => $systolic,
            'diastolic' => $diastolic,
            'glucose' => $glucose,
            'report_Result' => $report_Result,
            'glucose_Result' => $glucose_Result,
            'pressure_Result' => $pressure_Result,
            'oxygan_Result' => $oxygan_Result,
            'heart_Result' => $heart_Result,
            'sensor_data' => $sensor_data,
            'patient_data' => $patient_data,
            'patient_Age' => $patient_Age,
            // 'oxygan_Result' => $oxygan_Result,
            // 'heart_Result' => $heart_Result,
            // 'pressure_Result' => $pressure_Result,
            // 'glucose_Result' => $glucose_Result,



        ]);

        //return "yes";


       // return session('id');

        DB::table('patient-vital-sign')->insert([
            'MRN' => session('id'),

            'date' => date('Y-m-d H:i:s'),
            'systolic' => $request->systolic,
            'diastolic' => $request->diastolic,
            'measureTextArea' => $request->measureTextArea,
            'symptoms' => $checkboxValuesString,
            'effects' => $effects,
            'doctor_id' => $doctor_id->doctor_id,
            //'measureTextArea'=>$reqeust->request,
            'glucose' => $request->glucose,
            'report' => $report_Result,
            'glucose_result' => $glucose_Result,
            'pressure_result' => $pressure_Result,
            'heart_result' => $heart_Result,
            'oxygan_result' => $oxygan_Result,
            
        ]);

        // DB::table('patient_complaint')->insert([
        //     'medicine_side_effects' => $effects,
        //     'symptom' => $checkboxValuesString,
        //     'doctor_id' => $patient_complaint->doctor_id,
        //     'MRN' => $patient_complaint->MRN,
        //     'medication_allergies' => $patient_complaint->medication_allergies,
        //     'chief_complaint' => $patient_complaint->chief_complaint,
        //     'previous_surgeries' => $patient_complaint->previous_surgeries,
        //     'current_medications' => $patient_complaint->current_medications,
        //     'notes' => $patient_complaint->notes,
        //     'created_at' => now(),


        // ]);








        return redirect('/PatientResult');
        return view('patient_pages.result', get_defined_vars());
        // return view('patient_pages.PatientResult', )









        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        return back();



        $checkboxValues = $request->input('symptoms');
        $checkboxValuesString = implode(',', $checkboxValues);
        $checkboxValuesString = str_replace(",", "\n", $checkboxValuesString);


        /////////////////////////////////////////
        $effects = $request->input('effects');
        $effects = implode(',', $effects);
        ///$checkboxValuesString = str_replace(",", "\n", $checkboxValuesString);


        return $checkboxValuesString . ' - - ' . $effects;

        DB::table('my_table')->insert([
            'checkbox_column' => $checkboxValuesString,
            // other columns and values
        ]);


        return $request->all();
        session()->forget('namealaa');

        return session('namealaa') . ' ' . session('agealaa');
    }



    public function ChartTest()
    {

 
    
        $today = \Carbon\Carbon::today();

        return $today;
        $dataTodaystable = DB::table('patient-vital-sign')
                        ->whereDate('recorded_at', '=', $today)
                        ->where('report' , 'stable')
                        ->where('doctor_id' , session('doctorid'))->distinct()->count('MRN');

               return    $dataTodaystable;      
        // Retrieve data from database
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

        // Pass data to view
        return view('salesindex', compact('yesterday', 'lastWeek', 'today'));
        return view('salesindex', compact('chartDataJson'));

    }
}