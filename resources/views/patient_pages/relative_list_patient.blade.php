<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relatives</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<!-- relative_list_patient -->

<body>
    <div class="page d-flex">
        @include('patient_pages.components.sidebar')

        <div class="content w-full">
            <!-- Start Head -->
            @include('patient_pages.components.head')

            <!-- End Head -->
            <h1 class="p-relative">Relatives</h1>
            <div class="friends-page d-grid m-20 gap-20">






                @foreach ($data_fo_relatives as $key => $value)
                    <div style="" class="friend bg-white rad-6 p-20 p-relative">
                        <div class="contact">
                            {{-- <i class="fa-solid fa-phone"></i>
                        <i class="fa-regular fa-envelope"></i> --}}
                        </div>
                        <div class="txt-c">
                            <img class="rad-half mt-10 mb-10 w-100 h-100" src="{{ asset('images') }}/{{   $value->relative_img  }}"
                                alt="" />
                            <h4 class="m-0">{{ $value->name }}</h4>
                            {{-- <p class="c-grey fs-13 mt-5 mb-0">{{ $value->relatively_degree}}</p> --}}
                        </div>
                        <div class="icons fs-14 p-relative">
                            <div class="mb-10">
                                <i class="fa-regular fa-envelope fa-fw"></i>
                                <span> {{ $value->email }}</span>
                            </div>
                            <div class="mb-10">
                                <i class="fa fa-phone fa-fw"></i>
                                <span>Phone: {{ $value->phone }}</span>
                            </div>
                            <div class="mb-10">
                                <i class="fa-solid fa-user"></i> <span>Relative Degree:
                                    {{ $value->relatively_degree }}</span>
                            </div>

                        </div>
                        <div class="info between-flex fs-13">
                            <span class="c-grey"></span>
                            <div>
                                 <a class="bg-blue c-white btn-shape" href="/chatify/{{ \App\Models\User::where('email' ,  $value->email)->first()->id }}">Send message</a>  
                                <a class="bg-red c-white btn-shape"
                                    href="/removeRelative/{{ $value->relative_id }}">Remove</a>
                            </div>
                        </div>
                    </div>
                @endforeach







            </div>
        </div>
    </div>

</body>

</html>
