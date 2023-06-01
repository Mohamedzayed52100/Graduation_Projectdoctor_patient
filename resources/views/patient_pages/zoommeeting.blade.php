<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zoom meeting</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>
    

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
            <h1 class="p-relative">Zoom meeting</h1>
            <div class="profile-page m-20">
                <!-- Start Overview -->
                
               
                <div class="other-data d-flex gap-20">


                    <div class="activities p-20 bg-white rad-10 mt-20">


                        <div class="targets p-20 bg-white rad-10">
                          














































                            <div class="content w-full">
                                <!-- Start Head -->


                                <!-- End Head -->
                                 <div class="settings-page m-20 d-grid gap-20">
                                  
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Doctor name</th>
                                            <th scope="col">Topic</th>
                                            <th scope="col">Start at</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Meeting Password</th>
                                            <th scope="col">Join meeting</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $zoomdata as $key => $value )
                                                
                                          
                                          <tr>
                                            <th scope="row">{{ $loop->iteration	 }}</th>
                                            <td>{{  \DB::table('doctor')->where('doctor_id', $value->doctor_id)->first()->name  }}</td>
                                            <td>{{ $value->topic }}</td>
                                            <td>{{ $value->start_at }}</td>
                                            <td>{{ $value->duration }}</td>
                                            <td>{{ $value->password }}</td>
                                            <td>  <a href="{{  $value->join_url }}">Join Zoom Meeting</a></td>
                                          

                                           </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
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
