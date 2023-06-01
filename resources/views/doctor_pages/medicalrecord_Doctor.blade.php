<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- FontAwesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/DoctorCss/style.css">


    <title>AdminHub</title>



   <script type="text/javascript"" src="https://www.gstatic.com/charts/loader.js"></script>





    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  





    <!--chartsssssssss

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 

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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Patient Medical Record</a>
                        </li>
                    </ul>
                </div>
                {{-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a> --}}
            </div>



            <div class="formbold-main-wrapper">

                <div class="formbold-form-wrapper">

                    <img src="{{ asset('images') }}/{{ $data->patient_image }}">

                    <form action="/medicalrecord_Doctor_submit" method="POST">
                        @csrf
                        <div class="formbold-form-title">
                            <h2 class="">{{ $data->name }}</h2>


                        </div>

                        <div class="formbold-input-flex">
                            <div>
                                <label for="sex" class="formbold-form-label">Sex</label>
                                <input type="text" name="sex" id="s" class="formbold-form-input"
                                    value="{{ $data->sex }}" readonly />
                                <input type="hidden" name="patient_id" id="id" class="formbold-form-input"
                                    value="{{$patient_id }}" readonly />
                                <input type="hidden" name="doctor_id" id="id" class="formbold-form-input"
                                    value="{{ session('doctorid') }}" readonly />
                            </div>
                            <div>
                                <label for="age" class="formbold-form-label"> Age </label>
                                <input type="text" name="age" id="age" class="formbold-form-input"
                                    value="{{ $patient_age }}" readonly />
                            </div>
                        </div>

                        <div class="formbold-input-flex">
                            <div>
                                <label for="status" class="formbold-form-label"> Status </label>
                                <input type="text" name="status" id="status" class="formbold-form-input"
                                    value="{{ $data->status }}" readonly />
                            </div>
                            <div>
                                <label for="dept" class="formbold-form-label"> Disease </label>
                                <input type="text" name="disease" id="disease" class="formbold-form-input"
                                    value="{{ \App\Models\Disease::where('disease_id' , $dataforhealthstatus->disease_id)->first()->name }}" readonly />
                            </div>
                        </div>

                        <!--tryyyy-->
                        <ul class="box-info2">
                            <li>
                                <i class='fa fa-heartbeat'></i>

                                <span class="text">
                                    <h3> Blood Glucose</h3>
                                    <p>{{ $data->glucose }} mg/dL</p>
                                </span>
                            </li>
                            <li>
                                <i class="fas fa-kit-medical"></i>
                                <span class="text">
                                    <h3>Blood Pressure</h3>
                                    <p>{{ $data->systolic }} / {{ $data->diastolic }} mmHg</p>
                                    {{-- <p> 2  mmHg</p> --}}
                                </span>
                            </li>

                            <li style="width: 720px; height:370px; text-align:center ;" >
                                {{-- <i class="fas fa-lungs"></i> --}}
                                <span class="text">
                                    <h3  >Oxygen Saturation and heart rate </h3>
                                    {{-- <p>{{ $data->oxygen_rate }} bpm</p> --}}
                                    <div id="chart_div" style="width: 650px; height: 290px"></div>
                                </span>
                            </li>

                            {{-- <li>
                                <i class="fa-solid fa-droplet"></i>
                                <span class="text">
                                    <h3> Blood Glucose</h3>
                                    <p>{{ $data->glucose }} mg/dL</p>
                                </span>
                            </li> --}}

                        </ul>

                        <div class="formbold-mb-3">
                            <label for="chief_complaint" class="formbold-form-label">Chief Complaint </label>
                            <textarea rows="3" name="chief_complaint" id="chief_complaint" class="formbold-form-input" readonly>{{ $data_complaint->chief_complaint }}</textarea>
                        </div>

                        <div class="formbold-input-flex">
                            <div>
                                <label for="surgery" class="formbold-form-label">previous surgeries </label>
                                <input type="text" name="previous_surgeries" id="previous_surgeries" class="formbold-form-input"
                                    value="{{  $data_complaint->previous_surgeries }}" readonly />
                            </div>
                            <div>
                                <label for="symptoms" class="formbold-form-label">medication allergies</label>
                                <input type="text" name="medication_allergies" id="medication_allergies" class="formbold-form-input"
                                    value="{{  $data_complaint->medication_allergies }}" readonly />
                            </div>
                        </div>

                        <div class="formbold-input-flex">
                            <div class="formbold-mb-3" style="width: 720px;">
                                <label for="medecation" class="formbold-form-label">Current Medications</label>
                                <input type="text" name="current_medications" id="current_medications" class="formbold-form-input"
                                value="{{  $data_complaint->current_medications }}" readonly />
                                {{-- <ul class="formbold-form-list">
                                    <li>{{ $data_complaint->current_medications }} </li>

                                </ul> --}}
                            </div>

                            {{-- <div class="formbold-mb-3">
                                <label for="side effect" class="formbold-form-label">Medicine Side Effects</label>
                                <input type="text" name="medicine_side_effects" id="medicine_side_effects" class="formbold-form-input"
                                value="{{  $data->effects }}" readonly />
                                
                            </div> --}}
                        </div>


                        {{-- <div class="formbold-mb-3">
                            <label for="address" class="formbold-form-label">Lab Tests</label>
                            <input type="file" name="test" id="test" class="formbold-form-input"
                                onchange="previewFile()" accept=".pdf" readonly />
                        </div> --}}
                        <div class="formbold-mb-3">
                            <label for="message" class="formbold-form-label">Medicine Side Effects </label>
                            <textarea rows="4" name="notes" id="notes" class="formbold-form-input" readonly>{{  $data->effects }}</textarea>
                        </div>
                        <div class="formbold-mb-3">
                            <label for="message" class="formbold-form-label">Last Visit Notes </label>
                            <textarea rows="4" name="notes" id="notes" class="formbold-form-input" readonly>{{  $data_complaint->notes }}</textarea>
                        </div>

                        <div class="formbold-mb-3">
                            <label for="newnotes" class="formbold-form-label">Doctor Notes </label>
                            <textarea rows="6" name="newnotes" id="newnotes" class="formbold-form-input"></textarea>
                            @error('newnotes')
                                <p style="color:red;text-align:center;margin-top:20px;">{{ $message }}</p>
                            @enderror
                        </div>


                            <a href="/chatify/{{ \App\Models\User::where('email', $data->email)->first()->id }}"
                                class="formbold-btn chaifybtn">Send Message</a>


                            <button  class="formbold-btn">Submit</button>
                        </div>



                </div>
                <!-- <div id="curve_chart" class="chart"></div> -->

                </form>
            </div>
            </div>
        </main>
        <script src="../js/DoctorJS/script.js"></script>-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

@if(Session::has('newnotes'))
<script>
swal("Geart Job!","{!! Session::get('newnotes') !!}",{
  button:"OK",
})
</script>

@endif

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $chartDataJson; ?>);

        var options = {
            title: 'Sensor Data Readings',
            curveType: 'function',
            legend: { position: 'bottom' },
            series: {
                0: { color: '#e2431e' }, // Systolic color
                1: { color: '#6f9654' }  // Diastolic color
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>


</body>

</html>
