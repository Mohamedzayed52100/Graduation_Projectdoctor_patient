<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />

</head>


<!-- patient_reports -->

<body>
    <div class="page d-flex">
        @include('patient_pages.components.sidebar')

        {{-- <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">Tele-Medicine </h3>
            <ul>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="HomePatient.html">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span>Advices</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="settingsPatient.html">
                        <i class="fa-solid fa-gear fa-fw"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="Patientprofile.html">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="choose_disease.html">
                        <i class="fa-solid fa-stethoscope fa-fw"></i>
                        <span>Diseases</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="PatientRequestLab.html">
                        <i class="fa-solid fa-flask fa-fw"></i>
                        <span>Request Lab </span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="relative_list_patient.html">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Relatives</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="vitalSigns.html">
                        <i class="fa fa-heartbeat fa-fw"></i>
                        <span>Measurements</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="patient_reports.html">
                        <i class="fa-regular fa-file-text fa-fw"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="PatientLogin.html">
                        <i class="fa fa-sign-out fa-fw"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div> --}}
        <div class="content w-full">
            <!-- Start Head -->
            @include('patient_pages.components.head')
            <!-- Start Head -->

             <h1 class="p-relative">Reports</h1>
            <div class="plans-page d-grid m-20 gap-20">
                <div class="plan blue bg-white p-20"  >

                    <div id="cases-pie-chart"></div>

                </div>
                <!-- Start Plan -->
                <div class="plan blue bg-white p-20">
                    <div id="chart_div3"  ></div>

                </div>
                <div class="plan blue bg-white p-20">

                    <div id="chart_div" ></div>

                </div>
                <!-- Start Plan -->
                <div class="plan blue bg-white p-20">
                    <div id="chart_div2" ></div>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Cases', { role: 'style' }],
                ['Stable', {{ $stable }}, 'color: green'],
                ['Unstable', {{ $unstable }}, 'color: orange'],
                ['Emergency', {{ $emergency }}, 'color: red']
            ]);

            var options = {
                title: 'Cases by Category',
                is3D: true,
                slices: {
                    0: { color: 'green' },
                    1: { color: 'orange' },
                    2: { color: 'red' }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('cases-pie-chart'));
            chart.draw(data, options);
        }
    </script>

{{-- sensor --}}
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

 
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $chartDataJson2; ?>);

        var options = {
            title: 'Presure Data Readings',
            curveType: 'function',
            legend: { position: 'bottom' },
            series: {
                0: { color: '#e2431e' }, // Systolic color
                1: { color: '#6f9654' }  // Diastolic color
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
    }
</script>

 



 


<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $chartDataJson3; ?>);

        var options = {
            title: 'Glucose Readings',
            curveType: 'function',
            legend: { position: 'bottom' },
            series: {
                0: { color: '#e2431e' }, // Systolic color
                // 1: { color: '#6f9654' }  // Diastolic color
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    }
</script>


 
</body>

 

</html>
