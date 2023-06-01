<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../all.min/all.min.css">
    <link rel="stylesheet" href="../css/DoctorCss/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Emergent Cases</title>
</head>

<body>

    <!-- SIDEBAR -->
    @include('doctor_pages.component.sidebar')




    <!-- SIDEBAR -->
    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->

        @include('doctor_pages.component.navbar')
        <!-- NAVBAR -->
        <main>
            <div class="head-title">
                <div class="left">
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Emergency List</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!---->
            <div class="container">
                @foreach ($final_res as $key => $value)
                    <div class="box">
                        <h2>   {{ \App\Models\Patient::where('MRN', $value->MRN)->first()->name   }}</h2>
                        <p>Medical Record Number is {{ $value->MRN }}</p>
                        <span
                            style="font-size: 20px; ">
                            {{ $value->name }}   </span>
                        <ul class="features">

                        {{-- <li>

                            {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->glucose_result }}
                            {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->pressure_result }}
                            {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->heart_result }}
                            {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->oxygan_result }}
                        </li> --}}

                 

                        <li style="text-align:center;" >
                            {{-- @if($value->oxygen_rate > 50) --}}
                                {{-- <i class="fa-solid fa-check"></i> --}}

                                {{-- @else --}}

                                 {{-- @endif --}}
                                {{-- <i class="fa-solid fa-check"></i> --}}
                                
                                Pressure:  {{  \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->systolic }} /                             {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->diastolic }}
                                mmHg 

                                @php
                                    $pressurestate= \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->pressure_result ;
                                @endphp
                                 @if( $pressurestate== "stable")

                                 <p style="color:#22c55e">{{ $pressurestate }}</p>

                                 @elseif ($pressurestate== "unstable")
                                 <p style="color:#ff9933">{{ $pressurestate }}</p>

                                 @else
                                 <p style="color:#ff0000">{{ $pressurestate }}</p>

                                 @endif


                             
                            </li>
 
                            <li style="text-align:center;" >
                                {{-- @if($value->heart_rate > 50) --}}
                                {{-- <i class="fa-solid fa-check"></i> --}}

                                {{-- @else --}}

                                 {{-- @endif --}}
                                {{-- <i class="fa-solid fa-check"></i> --}}
                                
                                Glucose:                            {{ \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->glucose }}
                                mg/dL

                                
                                @php
                                    $gulcoserestate= \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->glucose_result ;
                                @endphp
                                 @if( $gulcoserestate== "stable")

                                 <p style="color:#22c55e">{{ $gulcoserestate }}</p>

                                 @elseif ($gulcoserestate== "unstable")
                                 <p style="color:#ff9933">{{ $gulcoserestate }}</p>

                                 @else
                                 <p style="color:#ff0000">{{ $gulcoserestate }}</p>

                                 @endif
                            </li>
                            <li style="text-align:center;" >
                              
                                
                                Heart Result :        

                                @php
                                $heart_result= \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->heart_result ;
                            @endphp
                             @if( $heart_result== "stable")

                             <p style="color:#22c55e">{{ $heart_result }}</p>

                             @elseif ($heart_result== "unstable")
                             <p style="color:#ff9933">{{ $heart_result }}</p>

                             @else
                             <p style="color:#ff0000">{{ $heart_result }}</p>

                             @endif
                            </li>
                            <li style="text-align:center;" >
                              
                                
                                Oxygan Result :        

                                @php
                                $oxygan_result= \DB::table('patient-vital-sign')->where('MRN' , '=', $value->MRN)->orderBy('date' ,'desc')->first()->oxygan_result ;
                            @endphp
                             @if( $oxygan_result== "stable")

                             <p style="color:#22c55e">{{ $oxygan_result }}</p>

                             @elseif ($oxygan_result== "unstable")
                             <p style="color:#ff9933">{{ $oxygan_result }}</p>

                             @else
                             <p style="color:#ff0000">{{ $oxygan_result }}</p>

                             @endif
                            </li>
                         
                       
                            {{-- <li><i class="fa-solid fa-check"></i>Blood Pressure: {{ $value->pressure }} mmHg</li> --}}
                            {{-- <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: {{ $value->oxygen_rate }} bpm</li> --}}
                            {{-- <li><i class="fa-solid fa-xmark"></i>Blood Glucose: {{ $value->glucose }} mg/dL</li> --}}
                            {{-- First Relative !! --}}
                            {{-- <li><i class="fa-solid fa-check"></i> --}}
                                
                                  
                                {{-- <i class="fa-solid fa-user"></i> Relatives: --}}
                                 
                               
                             

                                    @php
                                    $rel =   $rel=DB::table('relative')->join('relative-patient' , 'relative.relative_id' , 'relative-patient.relative_id')->where('relative-patient.MRN', $value->MRN)->get();
          
                                @endphp
                                Relatives : 
          

          
                                @foreach (   $rel as $key => $value )
                             

                                <li>    <i class="fa-solid fa-check"></i>
                                    
                                    {{ $value->name }}</li>
                                    
                                @endforeach
                                 
                            
                        </ul>
                        <a href="medicalrecord_Doctor/{{ $value->MRN }}">
                            <button>View Medical Record</button>
                        </a>
                    </div>
                @endforeach
                {{-- <div class="box">
                    <h2>Ahmed Osama</h2>
                    <p>Medical Record Number is 1111</p>
                    <span>CHD<span>/Patient</span></span>
                    <ul class="features">
                        <li><i class="fa-solid fa-check"></i>Heart Rate: 79.72 bph</li>
                        <li><i class="fa-solid fa-check"></i>Blood Pressure: 119.55 mmHg</li>
                        <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: 15 bpm</li>
                        <li><i class="fa-solid fa-xmark"></i>Blood Glucose: 170 mg/dL</li>
                        <li><i class="fa-solid fa-check"></i>Relatives: Ahmed Ali</li>
                    </ul>
                    <a href="medicalrecord_Doctor.html">
                        <button>View Medical Record</button>
                    </a>
                </div> --}}
                {{-- <div class="box">
                    <h2>Ahmed Osama</h2>
                    <p>Medical Record Number is 1111</p>
                    <span>CHD<span>/Patient</span></span>
                    <ul class="features">
                        <li><i class="fa-solid fa-check"></i>Heart Rate: 79.72 bph</li>
                        <li><i class="fa-solid fa-check"></i>Blood Pressure: 119.55 mmHg</li>
                        <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: 15 bpm</li>
                        <li><i class="fa-solid fa-xmark"></i>Blood Glucose: 170 mg/dL</li>
                        <li><i class="fa-solid fa-check"></i>Relatives: Ahmed Ali</li>
                    </ul>
                    <a href="medicalrecord_Doctor.html">
                        <button>View Medical Record</button>
                    </a>
                </div> --}}
                {{-- <div class="box">
                    <h2>Ahmed Osama</h2>
                    <p>Medical Record Number is 1111</p>
                    <span>CHD<span>/Patient</span></span>
                    <ul class="features">
                        <li><i class="fa-solid fa-check"></i>Heart Rate: 79.72 bph</li>
                        <li><i class="fa-solid fa-check"></i>Blood Pressure: 119.55 mmHg</li>
                        <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: 15 bpm</li>
                        <li><i class="fa-solid fa-xmark"></i>Blood Glucose: 170 mg/dL</li>
                        <li><i class="fa-solid fa-check"></i>Relatives: Ahmed Ali</li>
                    </ul>
                    <a href="medicalrecord_Doctor.html">
                        <button>View Medical Record</button>
                    </a>
                </div> --}}
                {{-- <div class="box">
                    <h2>Ahmed Osama</h2>
                    <p>Medical Record Number is 1111</p>
                    <span>CHD<span>/Patient</span></span>
                    <ul class="features">
                        <li><i class="fa-solid fa-check"></i>Heart Rate: 79.72 bph</li>
                        <li><i class="fa-solid fa-check"></i>Blood Pressure: 119.55 mmHg</li>
                        <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: 15 bpm</li>
                        <li><i class="fa-solid fa-xmark"></i>Blood Glucose: 170 mg/dL</li>
                        <li><i class="fa-solid fa-check"></i>Relatives: Ahmed Ali</li>
                    </ul>
                    <a href="medicalrecord_Doctor.html">
                        <button>View Medical Record</button>
                    </a>
                </div> --}}
                {{-- <div class="box">
                    <h2>Ahmed Osama</h2>
                    <p>Medical Record Number is 1111</p>
                    <span>CHD<span>/Patient</span></span>
                    <ul class="features">
                        <li><i class="fa-solid fa-check"></i>Heart Rate: 79.72 bph</li>
                        <li><i class="fa-solid fa-check"></i>Blood Pressure: 119.55 mmHg</li>
                        <li><i class="fa-solid fa-xmark"></i>Respiratory Rate: 15 bpm</li>
                        <li><i class="fa-solid fa-xmark"></i>Blood Glucose: 170 mg/dL</li>
                        <li><i class="fa-solid fa-check"></i>Relatives: Ahmed Ali</li>
                    </ul>
                    <a href="medicalrecord_Doctor.html">
                        <button>View Medical Record</button>
                    </a>
                </div> --}}
            </div>

        </main>

        <script src="../js/DoctorJS/script.js"></script>
</body>

</html>
