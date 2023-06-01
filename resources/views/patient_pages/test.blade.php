<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request Lab</title>
    <link rel="stylesheet" href="PatientCSS/framework.css" />
    <link rel="stylesheet" href="PatientCSS/master.css" />
    <link rel="stylesheet" href="Lab_css/requestlab.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="PatientCSS/font-awesome.min.css">
    <link rel="stylesheet" href="PatientCSS/feathericon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />


    <style>
    
    /*------------- form -----------------*/
.card {
  width: 800px;
  margin-left: 200px;
  background-color: rgb(255, 253, 253);
  border-radius: 3px;
}

.card-body {
  margin-left: 20px;
  margin-right: 20px;
  margin-bottom: 20px;
  padding-top: 25px;
  padding-bottom: 25px;
}

.adr,
.fname,
.type,
.pay,
.date,
.form-control {
  margin-top: 10px;
  margin-bottom: 15px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;

}

.adr {
  width: 550px;

}

.fname,
.type,
.pay,
.date,
.form-control {
  width: 100%;

}

label {
  margin-bottom: 10px;
}

.btnsubmit {
  background-color: green;
  color: rgb(255, 251, 251);
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btnsubmit:hover {
  background-color: rgb(22, 83, 22);
}

.btnLocation {
  background-color: rgb(34, 34, 218);
  color: rgb(255, 251, 251);
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 200px;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  margin-left: 5px;
}

.btnLocation:hover {
  background-color: rgb(57, 57, 236);
}

.form-control {
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  font-size: medium;
}

.successRequest ,.failRequest{
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  font-size: large;
  font-weight: bold;
  text-align: center;
  padding-top: 20px;
}
.successRequest{
  color: green;
}
.failRequest{
  color: red;
}


    
    </style>
</head>


<!-- patient_request -->

<body>
    <div class="page d-flex">
         
        @include('patient_pages.components.sidebar')
        <div class="content w-full">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                <div class="search p-relative">
                </div>
                <div class="icons d-flex align-center">
                    <span class="notification p-relative">
                        <i class="fa-regular fa-bell fa-lg"></i>
                    </span>
                    <a href="Patientprofile.html"> <img src="Lab_images/admin.png" alt="" /></a>
                </div>
            </div>
            <!-- End Head -->
            <h1 class="p-relative">Request Lab</h1>
            <h2 style="margin-left:280px; color:grey;">Please , Fill The Next Form To Complete The Reservation</h2>
            <div class="container">
                <div class="card">
                    <!------ Alerts ------->
                    @if(session('successRequest'))
                        <div class="successRequest">
                            <strong>Success!</strong>  {{ session('successRequest') }}
                        </div>
                    @endif
                    @if(session('failRequest'))
                        <div class="failRequest">
                            <strong>Error!</strong> {{ session('failRequest') }}
                        </div>
                    @endif
                    <!------ /Alerts ------->
                    <div class="card-body">
                        <form action="/RequestLab" method="POST" class="requestform" enctype="multipart/form-data" autocomplete="off">
                            @csrf 
                            <input type="hidden" name="latiude" id="latiude" value="0">
                            <input type="hidden" name="longitude" id="longitude" value="0">
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input class="fname" type="text" id="fname" name="fname" readonly style="font-size: medium;" value="Heba Ahmed">
                            <label for="adr" style="display :block"><i class="fa fa-address-card-o"></i> Address <span style="color: red;">*</span></label>
                            <input class="adr" type="text" id="adr" name="adr" style="font-size: medium;" value="Benha , Egypt">
                            <button onclick="getLocation();" class="btnLocation">Get Location</button>
                            <label for="lab">-- Select Laboratory Name <span style="color: red;">*</span></label>
                            <select id="lab" name="lab" class="form-control" required>
                            {{-- <?php $labs = \DB::table('labunit')->get();  ?> --}}
                            <?php $id =1;  ?>
                            @foreach($labs  as $key=>$lab)
                                <option value="{{$lab->lab_name}}" >{{$id}} - {{$lab->lab_name}}</option>
                                <?php $id ++;  ?>
                            @endforeach  
                            </select>
                            <label for="type" style="display:block;"><i class="fa fa-flask" aria-hidden="true"></i> Select Test Type <span style="color: red;">*</span></label>
                            <!-- Test Name -->
                            <?php $Files = \DB::table('disease_test')->skip(0)->take(15)->get();  ?>
                            @foreach($Files  as $key=>$file)
                                <label for="testName"><input type="checkbox" id="tests[]" name="tests[]" value="{{$file->test_name}}">  {{$file->test_name}}</label><br>
                            @endforeach  
                            <br><label for="test" style="font-size:15px">If you do not find your specific test in the pervious list , please write its name in the next box: <span style="color: grey;">(optional)</span></label>
                            <input class="form-control typeahead" type="text" id="test" name="test" style="font-size: medium;" placeholder="Write Your Test Name Here ..">
                            <br><br><label for="date"><i class="fa fa-calendar" aria-hidden="true"></i> Select Appointment Date <span style="color: red;">*</span></label>
                            <input class="date" type="date" id="date" name="date" required style="font-size: medium;"><br><br>
                            <p style="display: inline; margin-right:100px;"><b> Taking Any Medications Currently ?  If YES , Please List it : </b><span style="color: grey;">(optional)</span></p>
                            <textarea rows="5" cols="100" autofocus placeholder="Write Here .." style=" resize: none;" class="medication" name="medication"  id="medication" ></textarea>

                            <label for="icon-container"><i class="fa fa-check" aria-hidden="true"></i> <b>Accepted Cards</b> </label>
                            <i class="fa fa-cc-visa" style="color:navy; font-size: 24px; padding: 7px 0;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;font-size: 24px; padding: 7px 0;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;font-size: 24px; padding: 7px 0;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;font-size: 24px; padding: 7px 0;"></i><br>
                            <label><b>-- Select the Way to Pay </b> </label>
                            <select name="paymentWay" id="paymentWay" class="form-control" required>
                                <option value="Cache">Cache</option>
                                <option value="Online Payment">Online Payment</option>
                            </select>
                            <input type="submit" value="Book Now" class="btnsubmit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    //Prevent Previous dates
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;
        $('#date').attr('min', maxDate);
    });
</script>


<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        //Send values of latiude and longitude to the inputs in form
        var Latitude = position.coords.latitude;
        var Longitude = position.coords.longitude;
        document.querySelector("#latiude").value = Latitude;
        document.querySelector("#longitude").value = Longitude;
        document.querySelector("#adr").value = "Updated using GPS";
        //Show the map with this location to the user
        window.open("/Map/"+Latitude+"/"+Longitude , "_blank");
           
    }
</script>

<!-- AutoComplete -->
<!-- jQuery & Typeahead.js -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"> </script>
<script>
    var path = "{{ route('search_test') }}";
    $('input.typeahead').typeahead({
        
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(result) {
                return process(result);
            });
        }

    });
</script>
</body>

</html>