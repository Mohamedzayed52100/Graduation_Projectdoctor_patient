<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />


    <!-- settings_patient -->
    <style>
        .content {
            position: relative;
            top: 200px;
        }

        .imgh {
            display: flex;
            align-items: center;
            margin-left: 395px;
        }

        .imgh img {
            width: 50px;
            height: 50px;
        }

        .imgh h1 {
            margin-top: 50px;
        }

        p {
            text-align: center;
            font-size: 20px;
            color: #2d2b2b;
        }

        h1 span {
            color: #0fc145;
        }
    </style>
</head>

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
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="settingsPatient.html">
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
                        <span>Request Lab</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="relative_list_patient.html">
                        <i class="fa-regular fa-circle-user fa-fw"></i>
                        <span>Relatives</span>
                    </a>
                </li>
                <!-- <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="vitalSigns.html">
                        <i class="fa fa-heartbeat fa-fw"></i>
                        <span>Measurements</span>
                    </a>
                </li> -->
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="chat.html">
                        <i class="fa fa-heartbeat fa-fw"></i>
                        <span>chats</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="patient_reports.html">
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
            <div class="center">

                <div class="imgh">
                    <img src="../asset/img/hand.jpg">

                    <h1>Welcome <span> {{ session('patient_login')->name }}</span></h1>
                    {{-- <h1>Welcome <span> {{ session('patient_login')->MRN }}</span></h1> --}}
                </div>
                <p>The right care when you need it most </p>
                <p>Care that’s about you. Always. With 24/7 access to certified doctors and specialists, you’re in good hands </p>
                <p>Tele-Med is dedicated to helping you get better and stay well.</p>
            </div>

        </div>

</body>

</html>
