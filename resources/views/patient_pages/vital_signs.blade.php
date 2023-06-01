<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Measurements</title>
    <link rel="stylesheet" href="../PatientCSS/all.min.css" />
    <link rel="stylesheet" href="../css/Patientcss/framework.css" />
    <link rel="stylesheet" href="../css/Patientcss/master.css" />
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">




</head>

<body>
    <div class="page d-flex">
        @include('patient_pages.components.sidebar')


        <div class="page-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- <div class="wizard-heading"></div> -->

            <div class="content w-full">

       {{-- <!-- Start Head -->
       @include('patient_pages.components.head')
       <!-- End Head -->
       <h1 class="p-relative">Measurements</h1> --}}

                <!-- Form -->
                <div  class="father" id="multi-step-form-container">
                    <!-- Form Steps / Progress Bar -->
                    <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                        <!-- Step 1 -->
                        <li class="form-stepper-active text-center form-stepper-list" step="1">
                            <a class="mx-2"> <span class="form-stepper-circle"><span>1</span></span></a>
                        </li>
                        <!-- Step 2 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                            <a class="mx-2"> <span class="form-stepper-circle"><span>2</span></span></a>
                        </li>
                        <!-- Step 3 -->
                        <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                            <a class="mx-2"> <span class="form-stepper-circle"><span>3</span></span></a>
                        </li>
                    </ul>



                    <form action="/justTest2" enctype="multipart/form-data" method="POST">
                        @csrf
                        <!-- Step 1 Content -->
                        <section id="step-1" class="form-step">
                            {{-- <input type="hidden" name="type" value="{{$type}}"> --}}
                            <h2 class="font-normal">Vital Signs</h2>
                            <p class="description">Please enter the following data , Make sure it is correct first</p>
                            <div class="mt-3">
                                <div class="mb-3 row">
                                    <label for="pressure" class="col-sm-2 col-form-label">Pressure:</label>
                                    <div class="col-sm-5">
                                        <input type="hidden"   name="num" value="{{$num}}" >
                                        <input type="number" min="80" max="250" name="systolic" class="form-control" id="pressure" placeholder="systolic" required>
                                    </div>
                                    {{-- <div class="col-sm-2">
                                        <span>|</span>
                                    </div> --}}
                                    <div class="col-sm-5">
                                        <input type="number" name="diastolic" min="50" max="150" class="form-control" id="pressure" placeholder="diastolic" required>
                                    </div>

                                </div>
                            </div>













                            <div class="mt-3">
                                <div class="mb-3 row">
                                    <label for="glucose" class="col-sm-2 col-form-label">Glucose:</label>
                                    <div class="col-sm-10">
                                        <input type="number" min="50" max="450" name="glucose"  class="form-control" id="glucose" placeholder="Write Here" required>
                                    </div>
                                </div>
                                <span style="display:block;text-align: center;color:gray;">At least 90 minutes after meals</span>

                            </div>
                            <div class="mt-3" style="margin-left:370px">
                                <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                            </div>
                        </section>


                        <!-- Step 2 Content, default hidden on page load. -->
                        <section id="step-2" class="form-step d-none">
                            <h2 class="font-normal">I Feel</h2>
                            <p class="description">The following list is general symptoms, Choose what you feel ..</p>
                            <div class="mt-3">
                                <div class="mb-3 row" style="margin-left:20px;">
                                    <label for="symptoms[]" class="myform-control" style="margin-right: 50px;"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="like I have the flu"> Like I have the flu</label>
                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="like I have to vomit"> Like I have to vomit</label>
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
                                    <label for="symptoms[]" class="myform-control"><input type="checkbox" id="symptoms[]" name="symptoms[]" value="paresthesia (numbness, electric tweaks)"> Paresthesia (numbness, electric tweaks)</label>
                                </div>
                            </div>
                            <div class="mt-3" style="margin-left:300px">
                                <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                                <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                            </div>
                        </section>


                        <!-- Step 3 Content, default hidden on page load. -->
                        <section id="step-3" class="form-step d-none">
                        <h2 class="font-normal">Medicine</h2>
                            <p class="description">In case that you take medicine and you have any of the following side effects , please choose them</p>
                            <div class="mt-3">
                                <div class="mb-3 row" style="margin-left:20px;">
                                    <label for="effects[]" class="myform-control-effects"><input type="checkbox" id="effects[]" name="effects[]" value="new heart palpitations"> New heart palpitations (heartbeats that suddenly become more noticeable)</label>
                                    <label for="effects[]" class="myform-control-effects"><input type="checkbox" id="effects[]" name="effects[]" value="tendon, muscle or joint pain"> Tendon, muscle or joint pain/usually in the knee, elbow or shoulder</label>
                                    <label for="effects[]" class="myform-control-effects"><input type="checkbox" id="effects[]" name="effects[]" value="skin rash that may include itchy, red, swollen, blistered or peeling skin"> You have a skin rash that may include itchy, red, swollen, blistered or peeling skin</label>
                                    <label for="effects[]" class="myform-control" style="margin-right:50px"><input type="checkbox" id="effects[]" name="effects[]" value="Soft stools, short-term diarrhea"> Soft stools, short-term diarrhea</label>
                                    <label for="effects[]" class="myform-control"><input type="checkbox" id="effects[]" name="effects[]" value="oedema"> Swollen ankles, feet and legs (oedema)</label>
                                    <label for="effects[]" class="myform-control"style="margin-right:50px"><input type="checkbox" id="effects[]" name="effects[]" value="Upset stomach, nausea"> Upset stomach, nausea</label>
                                    <label for="effects[]" class="myform-control"><input type="checkbox" id="effects[]" name="effects[]" value="Headache"> Headache</label>
                                    <label for="effects[]" class="myform-control" style="margin-right:50px"><input type="checkbox" id="effects[]" name="effects[]" value="photosensitivity"> Photosensitivity (can be severe)</label>
                                    <label for="effects[]" class="myform-control"><input type="checkbox" id="effects[]" name="effects[]" value="your mouth, face or lips start swelling"> Your mouth, face or lips start swelling</label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="mb-3 row" style="margin-left:20px;">
                                    <p style="font-weight:bold ; margin-top:20px">If you have any other side effects or symptoms , Write what you feel in the next textarea:</p>
                                    <textarea rows="5" cols="100" autofocus placeholder=" Write Here .." style=" resize: none;" class="measureTextArea" name="measureTextArea"  id="measureTextArea" ></textarea>
                                </div>
                            </div>
                            <div class="mt-3" style="margin-left:300px">
                                <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                                <button class="button submit-btn" type="submit">Save</button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
         </div>
    </div>

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




