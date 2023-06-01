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


     <!-- /////////////////////////////// -->

    <!-- viital_signs -->

    <link rel="stylesheet" type="text/css" href="css/Patientcss/opensans-font.css">
    <link rel="stylesheet" type="text/css"
        href="Patientfonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="css/Patientcss/jquery-ui.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../css/Patientcss/style.css" />

    <!-- ///////////////////////////////// -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}









        <link rel="stylesheet" href="css/lab_css/patientMeasure.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="PatientCSS/font-awesome.min.css">
        <link rel="stylesheet" href="PatientCSS/feathericon.min.css">

        <link rel="stylesheet" type="text/css" href="Patientcss/opensans-font.css">
        <link rel="stylesheet" type="text/css" href="Patientcss/jquery-ui.min.css">


        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



        <style>
            .form1{
                max-width: 750px;
            }
            .flex{
                display: flex;
                justify-content: space-between;
            }
            .next, .prev{
                background: #007bff;
            }
        </style>
    
    
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
                        <h3 class="page-title">Make Zoom meeting for Patients</h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li><i class='bx bx-chevron-right'></i></li>
                            <li>
                                <a class="active" href="#"> Zoom meeting </a>
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
                     
                                    <form action="/zoom/schedule" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <!-- Step 1 Content -->
                                        <section id="step-1" class="form-step">
                                            {{-- <input type="hidden" name="type" value="{{$type}}"> --}}
                                            <h2 class="font-normal">Make meeting</h2>
                                 
                
                
                
                
                
                
                
                
                
                
                
                
                
                                            <div class="mt-3">
                                                <div class="mb-3 row flex">
                                                    <label for="topic" class="col-sm-2 col-form-label">Topic :</label>
                                                    <div class="col-sm-10">
                                                        <input type="text"  name="topic"  class="form-control form1" id="topic" name="topic" required>
                                                    </div>
                                                </div>
                 
                                            </div>
                                            <div class="mt-3">
                                                <div class="mb-3 row flex" class="col-sm-2 col-form-label">
                                                    <label for="start_time">Start Time</label>
                                                    <div class="col-sm-10">
                                                        <input type="datetime-local" class="form-control form1" id="start_time" name="start_time" required  >
                                                    </div>
                                                </div>
                 
                                            </div>
                                            <div class="mt-3">
                                                <div class="mb-3 row flex">
                                                    <label for="duration">Duration </label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control form1" id="duration" name="duration" required>
                                                    </div>
                                                </div>
                 
                                            </div>



                                            <div class="mt-3">
                                                <div class="mb-3 row flex">
                                                    <label for="timezone">Timezone</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control form1" id="timezone" name="timezone" required>
                                                            <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                                            <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                                            <!-- Add more timezone options here -->
                                                        </select>                                                    </div>
                                                </div>
                 
                                            </div>
                                         
                                            <div class="form-group">
                                                <label for="agenda">Agenda</label>
                                                <textarea class="form-control" id="agenda" name="agenda" rows="3"></textarea>
                                            </div>
                                            <div class="mt-3" style="margin-left:370px">
                                                <button class="button btn-navigate-form-step next" type="button" step_number="2">Next</button>
                                            </div>
                                        </section>
                
                
                                        <!-- Step 2 Content, default hidden on page load. -->
                                        <section id="step-2" class="form-step d-none">
                                            <h2 class="font-normal">Choose Patients</h2>
                                            <p class="description">selcect from  following patient  </p>
                                            <div class="mt-3">
                                                <div class="mb-3 row" style="margin-left:330px;">
                                                    @foreach ( $patientdata as $key => $value )
                                                               <label for="patients[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="patient[]" name="patient[]" value="{{ $value->MRN }}"> {{ $value->name }}</label>

                                                    @endforeach
                                                  
                                                    {{-- <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="like I have to vomit"> Like I have to vomit</label>
                                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="sleepy"> Sleepy</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="fever"> Fever</label>
                                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="short of breath"> Short of breath</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="blurred vision"> Blurred vision</label>
                                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="unexplained weight loss"> Unexplained weight loss</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="feeling tired all the time"> Feeling tired all the time</label>
                                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="very hungry, even after eating"> Very hungry, even after eating</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="sores that do not heal"> Sores that do not heal</label>
                                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="dizzy/about to black out"> Dizzy/about to black out</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="dizzy/with the room spinning around me"> Dizzy/with the room spinning around me</label>
                                                    <label for="symptoms[]" class="myform-control"style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="my mouth is dry"> My mouth is dry</label>
                                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="paresthesia (numbness, electric tweaks)"> Paresthesia (numbness, electric tweaks)</label> --}}
                                                </div>
                                            </div>
                                            <div class="mt-3" style="margin-left:300px">
                                                <button class="button btn-navigate-form-step prev" type="button" step_number="1">Prev</button>
                                                {{-- <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button> --}}
                                                <button class="button submit-btn" type="submit">Save</button>

                                            </div>
                                        </section>
                
                
                                  
                                    </form>
                            
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
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"  integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        
        
        <script>
            /**
             * Define a function to navigate betweens form steps.
             * It accepts one parameter. That is - step number.
             */
            const navigateToFormStep = (stepNumber) => {
                /**
                 * Hide all form steps.
                 */
                document.querySelectorAll(".form-step").forEach((formStepElement) => {
                    formStepElement.classList.add("d-none");
                });
                /**
                 * Mark all form steps as unfinished.
                 */
                document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                    formStepHeader.classList.add("form-stepper-unfinished");
                    formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
                });
                /**
                 * Show the current form step (as passed to the function).
                 */
                document.querySelector("#step-" + stepNumber).classList.remove("d-none");
                /**
                 * Select the form step circle (progress bar).
                 */
                const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
                /**
                 * Mark the current form step as active.
                 */
                formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
                formStepCircle.classList.add("form-stepper-active");
                /**
                 * Loop through each form step circles.
                 * This loop will continue up to the current step number.
                 * Example: If the current step is 3,
                 * then the loop will perform operations for step 1 and 2.
                 */
                for (let index = 0; index < stepNumber; index++) {
                    /**
                     * Select the form step circle (progress bar).
                     */
                    const formStepCircle = document.querySelector('li[step="' + index + '"]');
                    /**
                     * Check if the element exist. If yes, then proceed.
                     */
                    if (formStepCircle) {
                        /**
                         * Mark the form step as completed.
                         */
                        formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                        formStepCircle.classList.add("form-stepper-completed");
                    }
                }
            };
            /**
             * Select all form navigation buttons, and loop through them.
             */
            document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
                /**
                 * Add a click event listener to the button.
                 */
                formNavigationBtn.addEventListener("click", () => {
                    /**
                     * Get the value of the step.
                     */
                    const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                    /**
                     * Call the function to navigate to the target form step.
                     */
                    navigateToFormStep(stepNumber);
                });
            });
        </script>
</body>

</html>
