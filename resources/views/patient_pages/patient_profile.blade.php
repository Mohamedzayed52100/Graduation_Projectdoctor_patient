<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />


    <style>
         .submit{
            background-color:#1e90ff;
  border-radius: 10%;
  border:none;
  color: white;
  padding: 16px 30px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
        }
        .image{
            font-weight: bold;
    color: dodgerblue;
    padding: 0.5em;
    border: thin solid grey;
    border-radius: 3px;
        }


    </style>

</head>

<!-- patient_profile -->

<body>
    <div class="page d-flex">
        @include('patient_pages.components.sidebar')


        <div class="content w-full">
            <!-- Start Head -->
            @include('patient_pages.components.head')

            <!-- End Head -->
            <h1 class="p-relative">Profile</h1>
            <div class="profile-page m-20">
                <!-- Start Overview -->
                <div class="overview bg-white rad-10 d-flex align-center">
                    <div class="avatar-box txt-c p-20">
                        <img class="rad-half mb-10" src="{{ asset('images') }}/{{ $patient_image }}" alt="" />
                        <h3 class="m-0">{{ session('patient_login')->name }}</h3>

                    </div>
                    <div class="info-box w-full txt-c-mobile">
                        <!-- Start Information Row -->
                        <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey fs-15 m-0 w-full">General Information</h4>
                            <div class="fs-14">
                                <span class="c-grey">Full Name</span>
                                <span>{{ session('patient_login')->name }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Gender:</span>
                                <span>{{ session('patient_login')->sex }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Country:</span>
                                <span>{{ session('patient_login')->country }}</span>
                            </div>
                            <div class="fs-14">
                                <label>
                                  
                                </label>
                            </div>
                        </div>
                        
                        <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey w-full fs-15 m-0">Personal Information</h4>
                            <div class="fs-14">
                                <span class="c-grey">Email:</span>
                                <span>{{ session('patient_login')->email }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Phone:</span>
                                <span>{{ session('patient_login')->phone }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Date Of Birth:</span>
                                <span>{{session('patient_login')->birth_of_date}}</span>
                            </div>
                            <div class="fs-14">
                                <label>

                                </label>
                            </div>
                        </div>
                    
                        <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey w-full fs-15 m-0">Treated By</h4>

                            @foreach ($data as  $key => $value)
                                
                          
                            <div class="fs-14">
                                <span class="c-grey">Dr:</span>
                                <span>{{ $value->name }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Phone:</span>
                                <span>{{ $value->phone }}</span>

                            </div>
                            <div class="fs-14">
                                {{-- <span class="c-grey">send message:</span> --}}
                              <a href="/chatify/{{ \App\Models\User::where('email', $value->email)->first()->id }}"> <span>Send Message to Dr /{{ $value->name }}</span></a>
                            </div>
                            
                            @endforeach
                        </div>
                        <!-- End Information Row -->
                        <!-- Start Information Row -->
                        {{-- <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey w-full fs-15 m-0">Health status</h4>
                            <div class="fs-14">
                                <span class="c-grey">Last visit:</span>
                                <span>{{ $Lastvisit }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">last month:</span>
                                <span>{{ $Lastmonth }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">last year:</span>
                                <span>{{ $lastyear }}</span>
                            </div>
                            <div class="fs-14">
                                <label>

                                </label>
                            </div>
                        </div> --}}
                        <!-- End Information Row -->
                    </div>
                </div>
                <!-- End Overview -->


                <!-- End Ticket Widget -->
                <!-- Start Other Data -->
                <div class="other-data d-flex gap-20">


                    <div class="activities p-20 bg-white rad-10 mt-20">


                        <div class="targets p-20 bg-white rad-10">
                            {{-- <div class="divid_it_zayed" style="display: flex; justify-content: space-between;">
                                <div>
                                    <h2 class="mt-0 mb-10">Comprehensive overveiw on your health condition for Last Vist
                                    </h2>


                                </div>
                                <div>
                                    <span
                                        style=" display: inline-block; width: 20px; height: 15px; background-color: #22c55e;"></span>
                                    Good
                                    <span
                                        style=" display: inline-block; width: 20px; height: 15px; background-color: #f59e0b;">
                                    </span> Abnormal
                                    <span
                                        style=" display: inline-block; width: 20px; height: 15px; background-color: red;"></span>
                                    Bad
                                </div>
                            </div> --}}

                            {{-- <div class="target-row mb-20 blue center-flex">
                                <div class="icon center-flex">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                </div>
                                <div class="details">
                                    <span class="fs-14 c-grey">Diabetes </span>
                                    <span class="d-block mt-5 mb-10 fw-bold">{{ $Diabetesval }}</span>
                                    <div class="progress p-relative">
                                        @php
                                            $val=70;
                                        @endphp
                                        <span class="bg-blue blue" style="width: {{ $Diabetesval}}%">
                                            <span class="bg-blue">{{ $Diabetesval }}%</span>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="target-row mb-20 center-flex orange">
                                <div class="icon center-flex">
                                    <i class="fa fa-heartbeat" aria-hidden="true"></i>
                                </div>
                                <div class="details">
                                    <span class="fs-14 c-grey">Coronary heart disease </span>
                                    <span class="d-block mt-5 mb-10 fw-bold">{{ $coronaryheartdiseaseval }}</span>
                                    <div class="progress p-relative">
                                        <span class="bg-orange orange" style="width: {{ $coronaryheartdiseaseval }}%">
                                            <span class="bg-orange">{{$coronaryheartdiseaseval}}%</span>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="target-row mb-20 center-flex green">
                                <div class="icon center-flex">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                                <div class="details">
                                    <span class="fs-14 c-grey"> Chronic kidney disease</span>
                                    <span class="d-block mt-5 mb-10 fw-bold">{{ $Chronickidneydiseaseval }}</span>
                                    <div class="progress p-relative">
                                        <span class="bg-green green" style="width: {{ $Chronickidneydiseaseval }}%">
                                            <span class="bg-green">{{ $Chronickidneydiseaseval }}%</span>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}














































                            <div class="content w-full">
                                <!-- Start Head -->


                                <!-- End Head -->
                                 <div class="settings-page m-20 d-grid gap-20">
                                    <!-- Start Settings Box -->
                                    <div class="p-20 bg-white rad-10">
                                        <h2 class="mt-0 mb-10">Site Control</h2>
                                        <!-- <p class="mt-0 mb-20 c-grey fs-15">Control The Website If There Is Maintenance</p> -->
                                        <div class="mb-15 between-flex">


                                        </div>
                                        <form  method="post" action="/change_site_control">
                                            @csrf

                                            <input type="hidden"  name="MRN" value="{{ session('patient_login')->MRN}}" />
                                         <div class="mb-15">
                                            <label class="" for="first">Old Password</label>
                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" name="oldpassword"type="text" id="first" placeholder="enter old password" />
                                        </div>
                                        <div class="mb-15">
                                            <label class="" for="last">New Password</label>
                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" name="newpassword1" id="last" type="text" placeholder="enter new password" />
                                        </div>
                                        <div class="mb-15">
                                            <label class="" for="last">Confirm Password</label>
                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" name="newpassword1" id="last" type="text" placeholder="Confirm  password" />
                                        </div>


                                        <button type="submit" class="submit"  >Change</button>
                                    </form>
                                    </div>
                                    <!-- End Settings Box -->
                                    {{-- @php
                                        session('patient_login')->name ="ahmed";
                                        session('patient_login')->phone="123456789"
                                    @endphp --}}
                                    <!-- Start Settings Box -->
                                    <form method="post" action="/change_g_info" enctype="multipart/form-data">
                                        @csrf
                                    <div class="p-20 bg-white rad-10">

                                        <h2 class="mt-0 mb-10">General Info</h2>
                                        {{-- <p class="mt-0 mb-20 c-grey fs-15">General Information About Your Account</p> --}}
                                        <div class="mb-15">
                                            <label class="" for="first">First Name</label>
                                            <input type="hidden"  name="MRN" value="{{ session('patient_login')->MRN}}" />

                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" placeholder="Name" name="name"  value="{{ session('patient_login')->name }}" />
                                        </div>
                                        <div class="mb-15">
                                            <label class="" for="last">Phone</label>
                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" id="last" type="text" placeholder="Phone" name="phone" value="{{ session('patient_login')->phone }} "/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Profile Image</label>
                                            <input type="file"  name="file" class="image  form-control">
                                          </div>
                                          <div class="mb-15">
                                            <label class="" for="email">Email</label>
                                            <input class="b-none border-ccc p-10 rad-6 d-block w-full" id="email" type="email" placeholder="email" name="email" value="{{ session('patient_login')->email }} "/>


                                        </div>

                                        <button type="submit" class="submit"  >Change</button>

                                    </div>
                                </form>

                                </div>
                            </div>
































                        </div>

                    </div>
                </div>
                <!-- End Other Data -->



            </div>
        </div>
    </div>

</body>

</html>
