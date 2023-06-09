
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <label for="topic">Topic</label>
    <input type="text" class="form-control" id="topic" name="topic" required>
</head>
<body>
    


    
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form method="post" action="{{ route('zoom.schedule') }}">
@csrf

<div class="form-group">
    <label for="topic">Topic</label>
    <input type="text" class="form-control" id="topic" name="topic" required>
</div>

<div class="form-group">
    <label for="start_time">Start Time</label>
    <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
</div>

<div class="form-group">
    <label for="duration">Duration (in minutes)</label>
    <input type="number" class="form-control" id="duration" name="duration" required>
</div>

<div class="form-group">
    <label for="timezone">Timezone</label>
    <select class="form-control" id="timezone" name="timezone" required>
        <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
        <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
        <!-- Add more timezone options here -->
    </select>
</div>

<div class="form-group">
    <label for="agenda">Agenda</label>
    <textarea class="form-control" id="agenda" name="agenda" rows="3"></textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Schedule Meeting</button>
</div>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script>
  function previewFile(input){
    var file=$('input[type=file]').get(0).files[0];
    if(file){
      var reader = new FileReader();
      reader.onload =function(){
        $('#previewImg').attr('src', reader.result);
      }
      reader.readAsDataURL(file);
    }
  }
</script>
@if(Session::has('success_update'))
<script>
swal("Geart Job!","{!! Session::get('success_update') !!}",{
  button:"OK",
})
</script>

@endif
</body>
</html>

