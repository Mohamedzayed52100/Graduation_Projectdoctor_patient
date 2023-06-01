<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/DoctorCss/style.css">


    <!-- Favicons -->
    <link href="asset/img/features/" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="../asset/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="../asset/css/feathericon.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="../asset/plugins/datatables/datatables.min.css">



    
    
    <title>AdminHub</title>



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

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Patient</h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="#"> All Patients</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                 {{--  --}}
                                 {{--  --}}
                                 {{--  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            </div>



            <!-- CONTENT -->



            <!-- /Header -->


            <!-- /Page Wrapper -->


            <!-- /Main Wrapper -->

            <!-- jQuery -->
            <script src="../asset/js/jquery-3.2.1.min.js"></script>

            <!-- Bootstrap Core JS -->
            <script src="../asset/js/popper.min.js"></script>
            <script src="../asset/js/bootstrap.min.js"></script>

            <!-- Slimscroll JS -->
            <script src="../asset/plugins/slimscroll/jquery.slimscroll.min.js"></script>

            <!-- Datatables JS -->
            <script src="../asset/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../asset/plugins/datatables/datatables.min.js"></script>

            <!-- Custom JS -->
            <script src="../asset/js/script.js"></script>


            <script src="../js/DoctorJS/script.js"></script>
</body>

</html>
