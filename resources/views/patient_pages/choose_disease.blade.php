<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diseases List</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />

</head>

<body>
    <div class="page d-flex">
        @include('patient_pages.components.sidebar')


        <div class="content w-full">
            <!-- Start Head -->
            @include('patient_pages.components.head')

            <!-- End Head -->
            <h1 class="p-relative">Choose Diseases</h1>
            <div class="courses-page d-grid m-20 gap-20">
                <div class="course bg-white rad-6 p-relative">
                    <br><br><br>
                    <img class="cover" src="../image/PatientImages/kidney.png" alt="Kidney Image" /><br><br><br>
                    <div class="p-20">
                        <h4 style="margin-left: 7px;">Chronic Kidney Disease</h4>
                        <!-- <p class="description c-grey mt-15 fs-14">
                            Master The Art Of Web Designing And Mocking, Prototyping And Creating Web Design Architecture
                        </p> -->

                    </div>
                    <div class="info p-15 p-relative between-flex">
                        @php
                        $type=3;

                        @endphp
                        <a href="/measurement">
                       
                            <span class="title bg-blue c-white btn-shape">Continue</span><br>
                        </a>
                        <!-- <span class="c-grey">
                <i class="fa-regular fa-user"></i>
                950
              </span> -->
                        <!-- <span class="c-grey">
                <i class="fa-solid fa-dollar-sign"></i>
                165
              </span> -->
                    </div>
                </div>
                <div class="course bg-white rad-6 p-relative">
                    <img class="cover" src="../image/PatientImages/heart.jpg" alt="HeartBeat Image" />
                    <div class="p-20">
                        <h4 style="margin-left: 7px;">Coronary Heart Disease</h4>
                        <!-- <p class="description c-grey mt-15 fs-14">
                            Master The Art Of Data Strcuture And Famous Algorithms Like Sorting, Dividing And Conquering
                        </p> -->
                    </div>
                    <div class="info p-15 p-relative between-flex">
                        @php
                        $type=3;

                        @endphp
                        <a href="/measurement">
                            <span class="title bg-blue c-white btn-shape">Continue</span><br>
                        </a>
                        <!-- <span class="c-grey">
              <i class="fa-regular fa-user"></i>
              950
            </span> -->
                        <!-- <span class="c-grey">
              <i class="fa-solid fa-dollar-sign"></i>
              165
            </span> -->
                    </div>
                </div>
                <div class="course bg-white rad-6 p-relative">
                    <img class="cover" src="../image/PatientImages/diabetes.jpg" alt="Diabetes Image" />
                    <div class="p-20">
                        <h4 style="margin-left: 40px;">Diabetes Type 1</h4>
                        <!-- <p class="description c-grey mt-15 fs-14">
                            Mastering Responsive Web Design And Media Queries And Know Everything About Breakpoints
                        </p> -->
                    </div>
                    <div class="info p-15 p-relative between-flex">
                        @php
                        $type=1;

                        @endphp
                         <a href="/DiabetesType1">
                            <span class="title bg-blue c-white btn-shape">Continue</span><br>
                        </a>
                        <!-- <span class="c-grey"> <i class="fa-regular fa-user"></i> 650</span>
                        <span class="c-grey"><i class="fa-solid fa-dollar-sign"></i> 90</span> -->
                    </div>
                </div>
                <div class="course bg-white rad-6 p-relative">
                    <img class="cover" src="../image/PatientImages/diabetes.jpg" alt="Diabetes Image" />
                    <div class="p-20">
                        <h4 style="margin-left: 40px;">Diabetes Type 2</h4>
                        <!-- <p class="description c-grey mt-15 fs-14">
                            Mastering Responsive Web Design And Media Queries And Know Everything About Breakpoints
                        </p> -->
                    </div>
                    <div class="info p-15 p-relative between-flex">
                        @php
                        $type=2;

                        @endphp
                        <a href="/DiabetesType2">
                            <span class="title bg-blue c-white btn-shape">Continue</span><br>
                        </a>
                        <!-- <span class="c-grey"> <i class="fa-regular fa-user"></i> 650</span>
                        <span class="c-grey"><i class="fa-solid fa-dollar-sign"></i> 90</span> -->
                    </div>
                </div>






                <div class="course bg-white rad-6 p-relative">
                    <img class="cover" src="../image/PatientImages/Gdiabetes.jpg" alt="Diabetes Image" />
                    <div class="p-20">
                        <h4 style="margin-left: 20px;">Gestational Diabetes</h4>
                        <!-- <p class="description c-grey mt-15 fs-14">
                            Mastering Python To Prepare For Data Science And AI And Automating Things in Your Life
                        </p> -->
                    </div>
                    <div class="info p-15 p-relative between-flex">
                        @php
                        $type=3;

                        @endphp
                        <a href="/measurement">
                            <span class="title bg-blue c-white btn-shape">Continue</span><br>
                        </a>
                        <!-- <span class="c-grey"> <i class="fa-regular fa-user"></i> 950</span>
                        <span class="c-grey"><i class="fa-solid fa-dollar-sign"></i> 250</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
