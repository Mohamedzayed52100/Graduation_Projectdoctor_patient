<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- settings_patient -->
</head>

<body>

    <div class="page d-flex">

        @include('patient_pages.components.sidebar')
        <div class="content w-full">
            <!-- Start Head -->
            @include('patient_pages.components.head')

            <!-- End Head -->
            <h1 class="p-relative">Settings</h1>
            <div class="settings-page m-20 d-grid gap-20">
                <!-- Start Settings Box -->
                <div class="p-20 bg-white rad-10">
                    <h2 class="mt-0 mb-10">Site Control</h2>
                    <!-- <p class="mt-0 mb-20 c-grey fs-15">Control The Website If There Is Maintenance</p> -->
                    <div class="mb-15 between-flex">


                    </div>
                    <form  method="post" action="/change_site_control">
                        @csrf

                     <div class="mb-15">
                        <label class="" for="first">Old Password</label>
                        <input class="b-none border-ccc p-10 rad-6 d-block w-full" name="oldpassword"type="text" id="first" placeholder="enter old password" />
                    </div>
                    <div class="mb-15">
                        <label class="" for="last">New Password</label>
                        <input class="b-none border-ccc p-10 rad-6 d-block w-full" name="newpassword1" id="last" type="text" placeholder="enter new password" />
                    </div>
                    <div>
                        <label class="" for="email">New Password</label>

                        <input class="email b-none border-ccc p-10 rad-6 w-full mr-10" name="newpassword2" id="email" type="text" value="" />

                    </div>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-primary"  >Change</button>
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
                    <p class="mt-0 mb-20 c-grey fs-15">General Information About Your Account</p>
                    <div class="mb-15">
                        <label class="" for="first">First Name</label>
                        <input class="b-none border-ccc p-10 rad-6 d-block w-full" type="text" id="first" placeholder="Name" name="name"  value="{{ session('patient_login')->name }}" />
                    </div>
                    <div class="mb-15">
                        <label class="" for="last">Phone</label>
                        <input class="b-none border-ccc p-10 rad-6 d-block w-full" id="last" type="text" placeholder="Phone" name="phone" value="{{ session('patient_login')->phone }} "/>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Profile Image</label>
                        <input type="file"  name="file" class="form-control">
                      </div>
                    <div>
                        <label class="" for="email">Email</label>
                        <br/>
                        <input class="email b-none border-ccc p-10 rad-6 w-full mr-10" id="email" type="email" name="email" placeholder="enter your email"  value="{{ session('patient_login')->email }}" />
                        <br/>
                        <br/>
                        <button type="submit" class="btn btn-primary"  >Change</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    @if(Session::has('change_g_info'))
<script>
swal("Geart Job!","{!! Session::get('change_g_info') !!}",{
  button:"OK",
})
</script>

@endif
    @if(Session::has('password_ok'))
<script>
swal("Geart Job!","{!! Session::get('password_ok') !!}",{
  button:"OK",
})
</script>

@endif

</body>


</html>
