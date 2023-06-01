<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/DoctorCss/style.css">

    <title>AdminHub</title>

    <!--chartttttt-->
    <!--Donut Chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['case', 'number'],
                ['Stable', 50],
                ['Unstable', 20],
                ['Emergency', 30]
            ]);

            var options = {
                chartArea: {
                    left: 10,
                    top: 50,
                    width: '60%',
                    height: '60%'

                },
                title: 'TOTAL CASES',
                pieHole: 0.3,
                backgroundColor: 'transparent',
                colors: ['#3535f0', '#050596', '#05054d'],

            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <!--Column Chart-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Normal', 'Ubnormal', 'Emergency'],
                ['Last Week', 100, 20, 10],
                ['Yesterday', 200, 40, 20],
                ['Today', 150, 35, 14]
            ]);

            var options = {
                'width': 630,
                'height': 500,
                colors: ['#3535f0', '#050596', '#05054d'],
                backgroundColor: 'transparent',
                chart: {
                    title: 'TOTAL CASES',
                    subtitle: 'cases during last period',
                }

            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script> --}}

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

        <!-- MAIN -->
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
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>

            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-badge-check'></i>

                    <span class="text">
						<h3>Stable Cases</h3>
						<p>{{ $dataTodaystable }}</p>
					</span>
                </li>
                <li>
                    <i class='bx bxs-calendar-exclamation'></i>
                    <span class="text">
						<h3>Unstable Cases</h3>
						<p>{{ $dataTodayunstable }}</p>
					</span>
                </li>

                <li>
                    <i class='bx bxs-alarm-exclamation'></i>
                    <span class="text">
						<h3> Emergency</h3>
						<p>{{ $dataTodayemergency }}</p>
					</span>
                </li>

            </ul>
            <!--chart-->
            <div class="charts" style="display: flex; justify-content: space-between;">
                <div id="cases-chart" style="width: 600px; height: 500px;"></div>
                <div id="cases-pie-chart" style="width: 600px; height: 400px;"></div>
            </div>
            <!--Table-->

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Unstable Cases</h3>
                        <i href="#" class='bx'>View All</i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Disease</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table_show_unstable as $key => $value)


                            @php
                                $patient_name =\App\Models\Patient::where('MRN' , $value->MRN)->first();
                            @endphp
                            <tr>
                                <td>
                                    <img src="../asset/img/doctors/doctor-09.jpg">
                                    <p>{{ $patient_name->name  }}</p>
                                </td>
                                <td><span class="Disease">{{ $value->name }}</span></td>
                                <td><span class="status completed">{{ $value->status }}</span></td>
                                <td>
                                    <a href="/medicalrecord_Doctor/{{ $value->MRN }}">
                                        <button class="button button1">View</button></td>
                                </a>
                            </tr>
                            @endforeach
                             
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">
                        {!! $table_show_unstable->links() !!}
                    </div> --}}
                </div>
            </div>

          

         



        </main>
        <!-- MAIN -->
        <!-- </section> -->
        <!-- CONTENT -->


        <script src="../js/DoctorJS/script.js"></script>-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Period', 'Stable', 'Unstable', 'Emergency'],
                ['Today', {{ $dataTodaystable}}, {{ $dataTodayunstable }}, {{ $dataTodayemergency }}] , 

                ['Yesterday', {{ $dataYesterdaystable }}, {{ $dataYesterdayunstable }}, {{ $dataYesterdayemergency }}],

                ['Last Week', {{ $dataLastWeekstable }}, {{ $dataLastWeekunstable }}, {{ $dataLastWeekemergency }}],
                // ['Yesterday', {{ $yesterday->stable }}, {{ $yesterday->unstable }}, {{ $yesterday->emergency }}],
                // ['Last Week', {{ $lastWeek->stable }}, {{ $lastWeek->unstable }}, {{ $lastWeek->emergency }}],
                // ['Today', {{ $today->stable }}, {{ $today->unstable }}, {{ $today->emergency }}]
            ]);

            var options = {
                chart: {
                    title: 'Cases by Status and Period',
                    subtitle: ' Today , Yesterday and Last Week ',
                },
                bars: 'vertical',
                vAxis: {format: 'decimal'},
                height: 400,
                colors: ['#3366CC', '#FF9900','#DC3912'],
                legend: {position: 'top', maxLines: 3},
            };

            var chart = new google.charts.Bar(document.getElementById('cases-chart'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Cases', { role: 'style' }],
                ['Stable', {{ $dataTodaystable }}, 'color: #3366cc'],
                ['Unstable', {{ $dataTodayunstable }}, 'color: orange'],
                ['Emergency', {{ $dataTodayemergency }}, 'color: #DC3912']
                // ['Stable', {{ $yesterday->stable }}, 'color: #3366cc'],
                // ['Unstable', {{ $yesterday->unstable }}, 'color: orange'],
                // ['Emergency', {{ $yesterday->emergency }}, 'color: #DC3912']
            ]);

            var options = {
                title: 'Cases by Category',
                is3D: true,
                slices: {
                    0: { color: '#3366cc' },
                    1: { color: 'orange' },
                    2: { color: '#DC3912' }
                }
            };

            var chart = new google.visualization.PieChart(document.getElementById('cases-pie-chart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>
